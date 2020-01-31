@extends('layouts.app')

@section('title',$post->name)

@section('content')

@php /** @param App\Models\Post $post */@endphp
    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <div class="container">
                <div class="row">
                    <h1 class="mt-4 col">{{ $post->name }}</h1>
                    <a href="{{ route('post.edit',$post->id) }}" class="col-1">
                        <i class="fas fa-edit"></i>
                    </a>
                </div>
            </div>


            <!-- Author -->
            {{--<p class="lead">
                by
                <a href="#">Start Bootstrap</a>
            </p>--}}

            <hr>

            <!-- Date/Time -->
            <p>Posted on January 1, 2019 at 12:00 PM</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

            <hr>

            <!-- Post Content -->
            <p>{{ $post->content }}</p>

            <hr>

            <comment-component  comment-type="post" :item-id="{{ $post->id }}"></comment-component>

        </div>

        <!-- Sidebar Widgets Column -->
        @include('partials.sidebar')

    </div>
    <!-- /.row -->
@endsection
