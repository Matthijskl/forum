@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Alle theads van Categorie naam</div>
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <thead class="thead-dark">
                                <th>Name</th>
                                <th>Comments</th>
                            </thead>

                            <tbody>
                            @foreach($threads as $thread)
                                <tr>
                                    <td>{{ $thread->name }}</td>
                                    <td>dwfrerwagf</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection