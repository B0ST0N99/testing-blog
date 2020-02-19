@extends('layouts.app')

@section('title','Home')

@section('content')

    @if($errors->any())
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                    {{ $errors->first() }}
                </div>
            </div>
        </div>
    @endif

    @if(session('success'))
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                    {{ session()->get('success') }}
                </div>
            </div>
        </div>
    @endif

        <div class="list-group align-items-center" style="height: 100%; margin-bottom: 30%; margin-top: 10%">
            <a href="{{ route('category.create') }}" class="list-group-item list-group-item-action text-center w-25">Create new Category</a>
            <a href="{{ route('post.create') }}" class="list-group-item list-group-item-action text-center w-25">Create new Post</a>
        </div>



@endsection
