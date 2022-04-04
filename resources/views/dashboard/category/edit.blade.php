@extends('dashboard.layout')

@section('content')
<h1>Actualizar Categoria {{$category->title}}:</h1>
    @include('dashboard.fragment._errors-form')

    <form action="{{ route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
        @method("PATCH")
        @include('dashboard.category.__form',["task"=>"edit"])
    </form>
@endsection
