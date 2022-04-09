@csrf

        <label for="title">Titulo</label>
        <input type="text" class="form-control" name="title" id="title" value="{{old("title",$post->title)}}">
        <br>
        <label for="slug">Slug</label>
        <input type="text" class="form-control" name="slug" id="slug" value="{{old("slug",$post->slug)}}">
        <br>
        <label for="content">Contenido</label>
        <textarea name="content" id="content" class="form-control">{{old("content",$post->content)}}</textarea>
        <br>
        <label for="description">Descripcion</label>
        <textarea name="description" id="description" class="form-control">{{old("description","$post->description")}}</textarea>
        <br>

        <label for="category_id">Categoria</label>
        <select name="category_id" id="category_id" class="form-control mt-3 mb-3">
            <option value=""></option>
            @foreach ($categories as $title=>$id)
                <option {{old('category_id',$post->category_id) == $id ? 'selected' : ''}} value="{{$id}}">{{$title}}</option>
            @endforeach
        </select>

        <label for="posted">posteado</label>
        <select name="posted" id="posted" class="form-control mt-3 mb-3">
            <option {{old('posted',$post->posted) == "not" ? 'selected' : ''}} value="not">no</option>
            <option {{old('posted',$post->posted) == "yes" ? 'selected' : ''}} value="yes">si</option>
        </select>

        @if (isset($task) && $task =="edit")
            <label for="image">Imagen</label><br>
            <input type="file" name="image" id="image" class="mt-3">
        @endif
<br>
        <button type="submit" class="btn btn-success mt-3">Enviar</button>
