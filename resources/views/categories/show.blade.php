@extends('layouts.app')

@section('title',$category->name)

@section('content')
    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <div class="container">
                <div class="row">
                    <h1 class="mt-4 col">{{ $category->name }}  </h1>
                    <a href="{{ route('category.edit',$category->id) }}" class="col-1">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" style="background: transparent; border: 0"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>


            <!-- Author -->
            {{-- <p class="lead">
                 by
                 <a href="#">Start Bootstrap</a>
             </p>--}}

            <hr>

            <!-- Date/Time -->
            <p>Posted on {{ $category->created_at }}</p>

            <hr>

            <!-- Preview Image -->
            {{--<img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">--}}

            {{--            <hr>--}}
            {{----}}
        <!-- Post Content -->
            <p class="lead font-weight-bold text-center">Description</p>
            <p>{{ $category->description }}</p>

            <hr>
            <h1 class="my-4 text-center">Posts in this category
                <small></small>
            </h1>
            <hr>
            <!-- Blog Post -->
            @forelse ($category->posts as $post)
                <div class="card mb-4">
                    <img class="card-img-top img-fluid " src="/{{ $post->file }}" alt="Card image cap"
                         style="width: 100%;height: 20vw;object-fit: cover;">
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->name }}</h2>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="{{ route('post.show',$post->id) }}" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on {{ $post->created_at }} {{--by
                    <a href="#">Start Bootstrap</a>--}}
                    </div>
                </div>
            @empty
                There are no posts in this category.
            @endforelse

            <hr>


            <comment-component comment-type="category" :item-id="{{ $category->id }}"></comment-component>



            {{--  <!-- Comment with nested comments -->
              <div class="media mb-4">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                  <div class="media-body">
                      <h5 class="mt-0">Commenter Name</h5>
                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                      <div class="media mt-4">
                          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                          <div class="media-body">
                              <h5 class="mt-0">Commenter Name</h5>
                              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                          </div>
                      </div>

                      <div class="media mt-4">
                          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                          <div class="media-body">
                              <h5 class="mt-0">Commenter Name</h5>
                              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                          </div>
                      </div>

                  </div>
              </div>--}}

        </div>

        @include('partials.sidebar')

    </div>
    <!-- /.row -->

@endsection
