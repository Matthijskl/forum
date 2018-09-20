@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @foreach($categories as $category)
                    <div class="card-body">
                        <h2>{{ $category->name }}</h2>
                        <hr>
                        @foreach($category->subCategories as $subCategory)
                            <h5><a href="{{ route('threads.list', ['id' => $subCategory->id]) }}">{{ $subCategory->name }}</a></h5>
                        {{ $subCategory->description }}

                        <small class="text-muted"><br>
                            <i class="far fa-comments" style="color: deepskyblue;"></i> 12 &nbsp;
                            <i class="far fa-heart" style="color: red;"></i> 12 &nbsp;
                            <i class="fab fa-wpforms" style="color: limegreen;"></i> {{ $subCategory->count() }}
                        </small>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Laatst actieve berichten</div>
                <div class="card-body">
                    @foreach($comment as $comments)
                        <a href="{{ route('threads.show', ['id' => $comments->threads->id]) }}">{{ $comments->threads->name }}</a>
                            <br><small>{{ $comments->body }}</small>
                        <div class="mt-1"></div>
                        <small class="text-muted">Door: {{ $comments->user->name }}</small>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
