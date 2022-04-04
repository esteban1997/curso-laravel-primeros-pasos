@extends('dashboard.layout')

@section('content')

    <a href="{{route('category.create')}}">Crear</a>
    <a href="{{route('post.index')}}">Ir Posts</a>

    <table border="1">
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
                        <a href="{{route('category.edit',$c)}}">Editar</a>
                        <a href="{{route('category.show',$c)}}">Ver</a>
                        <form action="{{route('category.destroy',$c)}}" method="post">
                            {{--EL METOD ES PARA ACLARAR QUE TIPO DE PETICION ES--}}
                            @csrf
                            @method("DELETE")
                            <button type="submit">Eliminar</button>
                        </form>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$category->links()}}

@endsection
