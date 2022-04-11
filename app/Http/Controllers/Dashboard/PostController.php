<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::paginate(2);
        echo view('dashboard.post.index',compact('posts'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = Category::get();
        $categories = Category::pluck('id','title');
        $post = new Post();
        //dd($categories);
        echo view('dashboard.post.create',compact('categories','post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //validaciones con una clase es la siguiente linea
     public function store(StoreRequest $request)
    //public function store(Request $request)
    {

        //validaciones locales

        // $validated = $request->validate([
        //     "title" => "required|min:5|max:500",
        //     "slug" => "required|min:5|max:500",
        //     "content" => "required|min:10",
        //     "description" => "required|min:7",
        //     "category_id" => "required|integer",
        //     "posted" => "required"
        // ]);

        // $validated = $request->validate(StoreRequest::myRules());

        //se envia data, validaciones -> esto es para

        //$validated = Validator::make($request->all(),StoreRequest::myRules());

        //dd($validated->errors());

        /*$data = array_merge($request->all(),['image'=>'']);

        dd($data);*/

        // $data = $request->validated();

        // $data['slug']= Str::slug($data['title']);

        // dd($data);

        Post::create($request->validated());
        return to_route("post.index")->with('status',"Registro creado");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        echo view('dashboard.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //dd($post);
        $categories = Category::pluck('id','title');
        echo view('dashboard.post.edit',compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Post $post)
    {

        $data = $request->validated();
        if ( isset($data["image"])){
            $data["image"] = $filename= time().".".$data["image"]->extension();

            //dd($filename);

            $request->validated()["image"]->move(public_path("image"),$filename);
        }

        $post->update($data);
        //$this->index();
        return to_route("post.index")->with('status',"Registro actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("post.index")->with('status',"Registro eliminado");
    }
}
