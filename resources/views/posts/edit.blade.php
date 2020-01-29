@extends('layouts.app')
@section('title',$item->exists ?  'Edit post ' . $item->name : 'Create new post')
@section('content')
    @php /** @var \App\Models\Post $item */ @endphp

    @if($item->exists)
        <form method="POST"  action="{{ route('post.update', $item->id) }}">
        @method('PATCH')
    @else
     <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
    @endif
        @csrf

        <div class="container">
            @php
                /** @var \Illuminate\Support\ViewErrorBag $errors */
            @endphp
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
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('posts.includes.item_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('posts.includes.item_edit_add_col')
                </div>
            </div>
        </div>
        </form>
@endsection
