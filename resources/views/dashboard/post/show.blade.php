@extends('dashboard.layout')

@section('content')
<h1>{{$post->title}}</h1>

<h1>{{$post->posted}}</h1>

<p>{{$post->description}}</p>

<div>{{$post->content}}</div>
@endsection
