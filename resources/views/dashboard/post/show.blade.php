@extends('dashboard.layout')

@section('content')
<h1 class="form-control">{{$post->title}}</h1>

<h1 class="form-control">{{$post->posted}}</h1>

<p class="form-control">{{$post->description}}</p>

<div class="form-control">{{$post->content}}</div>

<a href="{{route('post.index')}}" class="btn btn-success" >Volver</a>

@endsection
