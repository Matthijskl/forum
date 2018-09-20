@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Alle theads van Categorie naam
                        <div class="float-right">
                            <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Maak een thread</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <thead class="thead-dark">
                                <th>Name</th>
                                <th>Comments</th>
                            </thead>

                            <tbody>
                            @foreach($threads as $thread)
                                <tr>
                                    <td><a href="{{ route('threads.show', ['id' => $thread->id]) }}">{{ $thread->name }}</a></td>
                                    <td>0</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('threads.create', ['id' => $category->id]) }}" id="">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>De naam voor jouw nieuwe thread</label>
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                        </div>
                        <div class="form-group">
                            <div class="modal-footer">
                                <button class="btn btn-success float-right">Maak aan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection