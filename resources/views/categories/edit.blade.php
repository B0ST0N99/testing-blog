@extends('layouts.app')
@section('title',$item->exists ?  'Edit category ' . $item->name : 'Create new category')
@section('content')
    @php /** @var \App\Models\Category $item */ @endphp

    @if($item->exists)
        <form method="POST"  action="{{ route('category.update', $item->id) }}">
        @method('PATCH')
    @else
     <form method="POST" action="{{ route('category.store') }}">
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
                    @include('categories.includes.item_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('categories.includes.item_edit_add_col')
                </div>
            </div>
        </div>
        </form>
@endsection
