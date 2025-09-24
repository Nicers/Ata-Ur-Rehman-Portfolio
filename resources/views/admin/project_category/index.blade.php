@extends('admin.layout.dashboard')
@section('content')
    <div class="container-fluid">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="projectModalTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="projectCategoryForm" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="" class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter category name">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between flex-wrap">
                <h6 class="m-0 font-weight-bold text-primary">All Project Categories</h6>
                <button type="button" onclick="addProject()" class="btn btn-primary" data-toggle="modal"
                    data-target="#exampleModal">
                    Add Category <i class="fa-solid fa-plus"></i>
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover w-100" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Sr.</th>
                                <th>Name</th>
                                <th>Category Projects</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sr.</th>
                                <th>Name</th>
                                <th>Category Projects</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($projectCategory as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->projects->count() }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" onclick="updateProject({{ $category }})"
                                                class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa-solid fa-pen"></i>
                                            </button>
                                            <button type="submit"
                                                onclick="event.preventDefault();document.getElementById('projectDelete{{ $category->id }}').submit();"
                                                class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                        <form class="d-none" id="projectDelete{{ $category->id }}"
                                            action="{{ route('admin.delete-project-category', $category->id) }}" method="post"
                                            class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{  asset('admin-panel/vendor/jquery/jquery.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
    
    <script>
        var form = document.getElementById('projectCategoryForm');
        var title = document.getElementById('projectModalTitle');
        var image = document.getElementById('projectImage');

        function addProject() {
            form.action = "{{ route('admin.add-project-category') }}?_method=POST";
            title.innerHTML = "Add New Project Category";
            form.name.value = '';
        }

        function updateProject(category) {
            title.innerHTML = "Update Project Category";
            form.action = "{{ route('admin.update-project-category', 'id') }}?_method=PUT".replace('id', category['id']);
            form.name.value = category['name'];
        }
    </script>
@endsection