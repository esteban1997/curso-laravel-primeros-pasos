@extends('dashboard.layout')

@section('content')

    <a href="{{route('category.create')}}" class="btn btn-success my-2">Crear</a>
    <a href="{{route('post.index')}}" class="btn btn-primary my-2">Ir Posts</a>

    <table class="table">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $c)
                <tr>
                    <td>{{$c->title}}</td>
                    <td>{{$c->slug}}</td>
                    <td>
                        <a href="{{route('category.edit',$c)}}" class="btn btn-primary my-1">Editar</a>
                        <a href="{{route('category.show',$c)}}" class="btn btn-primary my-1">Ver</a>
                        <form action="{{route('category.destroy',$c)}}" method="post">
                            {{--EL METOD ES PARA ACLARAR QUE TIPO DE PETICION ES--}}
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger my-1">Eliminar</button>
                        </form>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$category->links()}}

@endsection
