@extends('web.layout')

@section('content')
    <h1 class="card card-white mb-2">Listado</h1>
    <x-web.blog.post.index :posts="$posts">
        <h1>Listado principal de post</h1>
    </x-web.blog.post.index>

@endsection
