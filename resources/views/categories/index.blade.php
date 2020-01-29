@extends('layouts.app')


@section('content')
    <div class="list-group align-items-center" style="height: 100%; margin-bottom: 30%; margin-top: 10%">
        @foreach($categories as $category)
            <a href="{{ route('category.show',$category->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $category->name }}</h5>
                </div>
                <p class="mb-1">{{ $category->description }}</p>
            </a>
        @endforeach

    </div>

@endsection
