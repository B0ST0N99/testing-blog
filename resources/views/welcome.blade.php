@extends('layouts.app')

@section('title','Home')

@section('content')



        <div class="list-group align-items-center" style="height: 100%; margin-bottom: 30%; margin-top: 10%">
            <a href="{{ route('category.create') }}" class="list-group-item list-group-item-action text-center w-25">Create new Category</a>
            <a href="{{ route('post.create') }}" class="list-group-item list-group-item-action text-center w-25">Create new Post</a>
        </div>



@endsection
