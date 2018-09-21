@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $thread->name }}

                        <div class="float-right">
                            @if(\App\Helpers\PermissionHelper::has('can_lock_threads') && $thread->locked == 0)
                                <form method="post" action="{{ route('threads.close', ['id' => $thread->id]) }}">
                                    @csrf
                                    <button class="btn btn-danger">Lock thread</button>
                                </form>
                            @endif

                            @if($thread->locked == 1)
                                    <i class="fas fa-lock"></i>
                                @if(\App\Helpers\PermissionHelper::has('can_unlock_threads'))
                                        <form method="post" action="{{ route('threads.unlock', ['id' => $thread->id]) }}">
                                            @csrf
                                            <button class="btn btn-danger">Unlock thread</button>
                                        </form>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        @if(!$thread->locked == 1)
                        <form method="post" action="{{ route('threads.comment', ['id' => $thread->id]) }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <textarea name="body"></textarea>
                            </div>
                            <button class="btn btn-success float-right">Comment</button>
                        </form>
                            @endif
                    </div>
                </div>
            </div>
        </div>
        @if($thread->locked == 1)

        @else
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
                           {!!html_entity_decode($comment->body) !!}
                        </div>

                    </div>
                </div>
            </div>
            </div>
            @endforeach
        @endif
    </div>

@endsection