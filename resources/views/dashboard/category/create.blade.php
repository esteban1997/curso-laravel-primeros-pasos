@extends('dashboard.layout')

@section('content')

    @include('dashboard.fragment._errors-form')

    <form action="{{ route('category.store')}}" method="post">
        @include('dashboard.category.__form')
    </form>
@endsection
