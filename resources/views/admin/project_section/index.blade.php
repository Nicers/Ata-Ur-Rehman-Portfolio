@extends('admin.layout.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4 pb-4">
            <div class="card-header py-3 ">
                <h6 class="m-0 font-weight-bold text-primary">Home Page Project Section</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.project_section.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="container">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" required class="form-control" name="title"
                                        value="{{ isset($project_section->title) ? $project_section->title : '' }}" placeholder="Enter title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Description</label>
                                    <textarea name="desc" id="" class="w-100" required
                                        value="{{ isset($project_section->description) ? $project_section->description : '' }}">{{ isset($project_section->description) ? $project_section->description : '' }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Button Label</label>
                                    <input type="text" required class="form-control" name="button_txt"
                                        placeholder="Enter Button Label"
                                        value="{{ isset($project_section) ? $project_section->button_txt : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Button Url</label>
                                    <input type="text" required class="form-control" name="button_url"
                                        placeholder="Enter Button Url"
                                        value="{{ isset($project_section) ? $project_section->button_url : '' }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" id="title_descs">
                                    @if (isset($project_section))
                                        @if ($project_section->title_descs->count() > 0)
                                            @php
                                                $index = 1;
                                            @endphp
                                            @foreach ($project_section->title_descs as $title_desc)
                                                <div class="row" id="title_desc_{{ $index++ }}">
                                                    <div class="form-group col-md-6">
                                                        <label for="" class="form-label">Sub title</label>
                                                        <input type="text" class="form-control" name="sub_titles[]"
                                                            placeholder="Enter sub title" value="{{ $title_desc->title }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="" class="form-label">Sub Description</label>
                                                        <input type="text" class="form-control" name="sub_desc[]"
                                                            placeholder="Enter sub description" value="{{ $title_desc->description }}">
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    @else
                                        <div class="row" id="title_desc_1">
                                            <div class="form-group col-md-6">
                                                <label for="" class="form-label">Sub title</label>
                                                <input type="text" class="form-control" name="sub_titles[]"
                                                    placeholder="Enter sub title">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="" class="form-label">Sub Description</label>
                                                <input type="text" class="form-control" name="sub_desc[]"
                                                    placeholder="Enter sub description">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex flex-wrap">
                                        <button type="button" id="remove_title_desc" onclick="removeField()"
                                            class="btn btn-danger d-none mr-4">Remove Button</button>
                                        <button type="button" onclick="addField()" class="btn btn-primary mr-4">Add
                                            Sub Block</button>
                                        <button type="submit" class="btn btn-success mr-4">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var title_descs = document.getElementById('title_descs');
        title_desc_showHide();

        function addField() {
            var title_desc = document.getElementById('title_desc_1');
            var clone = title_desc.cloneNode(true);
            clone.id = `button_${title_descs.children.length + 1}`;
            title_descs.appendChild(clone);
            title_desc_showHide();
        }
        function title_desc_showHide() {
            var remove_title_desc = document.getElementById('remove_title_desc');
            if (title_descs.children.length > 1) {
                remove_title_desc.classList.add('d-block');
                remove_title_desc.classList.remove('d-none');
            } else {
                remove_title_desc.classList.remove('d-block');
                remove_title_desc.classList.add('d-none');
            }
        }
        function removeField() {
            var lastDiv = document.getElementById(`title_desc_${title_descs.children.length}`);
            lastDiv.remove();
            title_desc_showHide();
        }
    </script>
@endsection