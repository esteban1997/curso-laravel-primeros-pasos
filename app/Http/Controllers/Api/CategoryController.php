<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PutRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    public function index()
    {

        return response()->json(Category::paginate(2));

    }

    public function all(){
        return Category::all();
    }

    public function slug($slug){

        $category = Category::where("slug",$slug)->firstOrFail();

        return response()->json($category);

    }

    public function store(StoreRequest $request)
    {
        return response()->json(Category::create($request->validated()));
    }

    public function show(Category $category)
    {
        return response()->json($category);
    }

    public function update(PutRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json("eliminacion de categoria exitosa");
    }

    public function posts(Category $category){
        //sql builder aqui se one el nombre de las tablas, no d eclases ni de la relacion
        // $posts = Post::join('categories',"categories.id","=","posts.category_id")
        // ->select("posts.*","categories.title as category")
        // ->where("categories.id",$category->id)
        //->get();
        //->toSql();

        //eloquent utiliza el modelo
        $posts = Post::with("category")
        ->where("category_id",$category->id)
        ->get();
        //->toSql();

        return response()->json($posts);
    }
}
