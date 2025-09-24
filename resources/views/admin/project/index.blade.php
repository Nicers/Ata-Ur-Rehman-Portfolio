@extends('admin.layout.dashboard')
@section('content')
    <div class="container-fluid">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="projectModalTitle">Add New Project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="projectForm" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Project Category</label>
                                <select name="category_id" class="custom-select">
                                    <option value="">--select--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter project title">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">sitePath</label>
                                <input type="text" class="form-control" name="sitePath" placeholder="sitePath">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">gitPath</label>
                                <input type="text" class="form-control" name="gitPath" placeholder="gitPath">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image"
                                    onchange="document.getElementById('projectImage').src=window.URL.createObjectURL(this.files[0])" />
                            </div>
                            <div class="form-group">
                                <img src="" alt="" id="projectImage" class="w-50 h-50 rounded">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" onclick="sendForm()" class="btn btn-primary">Save Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between flex-wrap">
                <h6 class="m-0 font-weight-bold text-primary">All Projects</h6>
                <button type="button" onclick="addProject()" class="btn btn-primary" data-toggle="modal"
                    data-target="#exampleModal">
                    Add Project <i class="fa-solid fa-plus"></i>
                </button>
            </div>
            <div class="card-body w-100">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover w-100" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 5%">Sr.</th>
                                <th style="width: 20%">Title</th>
                                <th style="width: 20%">Site Path</th>
                                <th style="width: 20%">Git Path</th>
                                <th style="width: 20%">Image</th>
                                <th style="width: 15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $project->title }}</td>
                                    <td
                                        style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        <a href="{{ $project->sitePath }}" target="_blank" title="{{ $project->sitePath }}">
                                            {{ $project->sitePath }}
                                        </a>
                                    </td>
                                    <td
                                        style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        @if ($project->gitPath)
                                            <a href="{{ $project->gitPath }}" target="_blank" title="{{ $project->gitPath }}">
                                                {{ $project->gitPath }}
                                            </a>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>

                                    <td>
                                        <img src="{{ asset(Storage::url($project->image)) }}" class="img-fluid rounded"
                                            style="max-height: 80px; max-width: 120px;" alt="project image">
                                    </td>
                                    <td>
                                        <div class="btn-group sp" role="group">
                                            <button type="button" onclick="updateProject({{ $project }})"
                                                class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                            <button type="button"
                                                onclick="event.preventDefault(); document.getElementById('projectDelete{{ $project->id }}').submit();"
                                                class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                        <form id="projectDelete{{ $project->id }}"
                                            action="{{ route('admin.delete-project', $project->id) }}" method="post"
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
        $(document).ready(function(){
            $('#dataTable').DataTable();
        });
    </script>
    <script>
        var form = document.getElementById('projectForm');
        var title = document.getElementById('projectModalTitle');
        var image = document.getElementById('projectImage');

        function addProject() {
            form.action = "{{ route('admin.add-project') }}?_method=POST";
            title.innerHTML = "Add New Project";
            form.title.value = '';
            form.category_id.value = '';
            form.sitePath.value = '';
            form.gitPath.value = '';
            image.src = '';
        }
var projectId = 0;
        function updateProject(project) {
            projectId = project['id'];
            title.innerHTML = "Update Project";
            form.action = "{{ route('admin.update-project', 'id') }}?_method=PUT".replace('id', project['id']);
            form.title.value = project['title'];
            form.category_id.value = project['category_id'];
            form.sitePath.value = project['sitePath'];
            form.gitPath.value = project['gitPath'];
            image.src = "{{ asset(Storage::url('image')) }}".replace('image', project['image']);
        }

        function sendForm() {
    let formData = new FormData();

    formData.append("_token", "{{ csrf_token() }}"); // CSRF token for Laravel
    formData.append("_method", "PUT"); // Spoof PUT method
    formData.append("title", form.title.value);
    formData.append("category_id", form.category_id.value);
    formData.append("sitePath", form.sitePath.value);
    formData.append("gitPath", form.gitPath.value);

    // If a new image is selected
    if (form.image.files.length > 0) {
        formData.append("image", form.image.files[0]);
    }

    $.ajax({
        url: "{{ route('admin.update-project', ':id') }}".replace(":id", projectId),
        type: "POST", // still POST, but we spoof PUT with _method
        data: formData,
        processData: false, // prevent jQuery from converting data into query string
        contentType: false, // let browser set content-type including multipart
        success: function (response) {
            console.log("Project updated:", response);
            location.reload(); // reload table after update
        },
        error: function (xhr) {
            console.error("Error:", xhr.responseText);
        }
    });
}

    </script>
@endsection