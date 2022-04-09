@csrf

        <label for="title">Titulo</label>
        <input type="text" class="form-control" name="title" id="title" value="{{old("title",$category->title)}}">
        <br>
        <label for="slug">Slug</label>
        <input type="text" class="form-control" name="slug" id="slug" value="{{old("slug",$category->slug)}}">

        <button type="submit" class="btn btn-success mt-3">Enviar</button>
