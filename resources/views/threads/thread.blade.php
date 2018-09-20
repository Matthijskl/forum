@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $thread->name }}</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('threads.comment', ['id' => $thread->id]) }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}">
                            </div>
                            <button class="btn btn-success float-right">Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            @foreach($comments as $comment)
            <div class="row justify-content-center mt-4">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="float-left" style="padding:10px; border-right: 0.5px solid #ccc;">
                            <div class="text-center">
                                <img style="border-radius: 50%;" src="http://www.personalbrandingblog.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640-300x300.png" width="80">
                                <div class="mt-3"></div>{{ $comment->user->name }}<br>
                                @foreach($comment->user->roles as $roles)<span class="badge badge-pill badge-{{ $roles->label_type }}">{{ $roles->name }}</span>&nbsp;@endforeach
                            </div>
                        </div>
                        <div style="text-indent: 10px;">
                           {{ $comment->body }}
                        </div>

                    </div>
                </div>
            </div>
            </div>
            @endforeach
    </div>
@endsection