@extends('dashboard.layout')

@section('content')

    <a class="btn btn-success my-2" href="{{route('post.create')}}">Crear</a>
    <a class="btn btn-primary my-2" href="{{route('category.index')}}">Ir Categorias</a>

    <table class="table">
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
                        <a class="btn btn-primary my-1" href="{{route('post.edit',$p)}}">Editar</a>
                        <a class="btn btn-primary my-1" href="{{route('post.show',$p)}}">Ver</a>
                        <form action="{{route('post.destroy',$p)}}" method="post">
                            {{--EL METOD ES PARA ACLARAR QUE TIPO DE PETICION ES--}}
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger " type="submit">Eliminar</button>
                        </form>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$posts->links()}}

@endsection
