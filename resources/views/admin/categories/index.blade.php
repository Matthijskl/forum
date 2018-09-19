@extends('admin.base')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        {{ trans('admin.categories.table.title') }}
                        <div class="float-right"><button class="btn btn-success" data-toggle="modal" data-target="#create-new-categories">Maak een nieuwe categorie</button></div>
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
                                        <form method="post" action="{{ route('cp.categories.delete', ['id' => $category->id]) }}">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                    <div class="float-right"><button class="btn btn-info" data-toggle="modal" data-target="#edit-category">Edit</button>&nbsp;</div>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="edit-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit een category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{ route('cp.categories.edit', ['id' => $category->id]) }}">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label>De naam van de categorie</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                                                </div>
                                                <button class="btn btn-success float-right">Edit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    @include('admin.categories.partials.createcategory')

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