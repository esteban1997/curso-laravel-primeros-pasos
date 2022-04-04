@extends('dashboard.layout')

@section('content')

    @include('dashboard.fragment._errors-form')

    <form action="{{ route('post.store')}}" method="post">
        @include('dashboard.post.__form')
    </form>
@endsection
