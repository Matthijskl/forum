@extends('admin.base')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        {{ trans('admin.categories.table.title') }}
                        <div class="float-right"><button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Maak een nieuwe categorie</button></div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at }}
                                    <div class="float-right">
                                        <button class="btn btn-danger">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Maak een nieuwe blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <select class="form-control" id="requestSelect" value="niks">
                            <option>Categorie</option>
                            <option>Subcategorie</option>
                        </select>
                    </div>
                    <div id="create-category" style="display: none;">
                        <form method="post" action="{{ route('cp.categories.create') }}" id="">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>De naam voor jouw nieuwe categorie</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                            </div>

                            <div class="form-group">
                                <label>De descriptie voor jouw nieuwe categorie</label>
                                <input type="text" name="description" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success float-right">Maak aan</button>
                            </div>
                        </form>
                    </div>

                    <div id="create-sub-category" style="display: none;">
                        <form method="post" action="{{ route('cp.categories.sub.create') }}" id="">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>De naam voor jouw nieuwe sub-categorie</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                            </div>

                            <div class="form-group">
                                <label>Descriptie voor jouw nieuwe sub-categorie</label>
                                <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Voor welke categorie?</label>
                                <select class="form-control" name="parent_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success float-right">Maak aan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

            $('#requestSelect').change(function() {
                if($('#requestSelect').val() === 'Categorie') {
                    $('#create-category').show();
                    $('#create-sub-category').hide();
                }
                if($('#requestSelect').val() === 'Subcategorie') {
                    $('#create-category').hide();
                    $('#create-sub-category').show();
                }


            })

    </script>
@endsection