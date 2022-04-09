@extends('dashboard.layout')

@section('content')
<h1>{{$category->title}}</h1>

<h1>{{$category->posted}}</h1>

<a href="{{route('category.index')}}"  class="btn btn-success" >Volver</a>

@endsection
