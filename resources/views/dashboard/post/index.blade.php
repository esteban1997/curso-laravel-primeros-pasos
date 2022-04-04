@extends('dashboard.layout')

@section('content')

    <a href="{{route('post.create')}}">Crear</a>

    <table border="1">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Posted</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $p)
                <tr>
                    <td>{{$p->title}}</td>
                    <td>{{$p->category->title}}</td>
                    <td>{{$p->posted}}</td>
                    <td>
                        <a href="{{route('post.edit',$p)}}">Editar</a>
                        <a href="{{route('post.show',$p)}}">Ver</a>
                        <form action="{{route('post.destroy',$p)}}" method="post">
                            {{--EL METOD ES PARA ACLARAR QUE TIPO DE PETICION ES--}}
                            @csrf
                            @method("DELETE")
                            <button type="submit">Eliminar</button>
                        </form>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$posts->links()}}

@endsection
