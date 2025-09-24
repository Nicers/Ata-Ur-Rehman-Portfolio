@extends('admin.layout.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 ">
                <h6 class="m-0 font-weight-bold text-primary">Home Page Hero Section</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.hero-store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="container">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" required class="form-control" name="title"
                                        value="{{ isset($hero->title) ? $hero->title : '' }}" placeholder="Enter title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Description</label>
                                    <textarea name="desc" id="" class="w-100" required
                                        value="{{ isset($hero->description) ? $hero->description : '' }}">{{ isset($hero->description) ? $hero->description : '' }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Moving Text-1</label>
                                    <input type="text" required class="form-control" name="moving_txt1"
                                        placeholder="Enter Moving Text"
                                        value="{{ isset($hero->moving_txt1) ? $hero->moving_txt1 : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Moving Text-2</label>
                                    <input type="text" required class="form-control" name="moving_txt2"
                                        placeholder="Enter Moving Text"
                                        value="{{ isset($hero->moving_txt2) ? $hero->moving_txt2 : '' }}">
                                </div>
                            </div>
                              <div class="row">
                                <div class="col-12" id="buttons">
                                    @if (isset($hero))
                                        @if ($hero->buttons->count() > 0)
                                            @php
                                                $index = 1;
                                            @endphp
                                            @foreach ($hero->buttons as $btn)
                                                <div class="row" id="button_{{ $index++ }}">
                                                    <div class="form-group col-md-6">
                                                        <label for="" class="form-label">Button Label</label>
                                                        <input type="text" required class="form-control" name="labels[]"
                                                            placeholder="Enter Button Label" value="{{ $btn->label }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="" class="form-label">Button Url</label>
                                                        <input type="text" required class="form-control" name="urls[]"
                                                            placeholder="Enter Button Url" value="{{ $btn->url }}">
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    @else
                                            <div class="row" id="button_1">
                                                <div class="form-group col-md-6">
                                                    <label for="" class="form-label">Button Label</label>
                                                    <input type="text" required class="form-control" name="labels[]"
                                                        placeholder="Enter Button Label">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="" class="form-label">Button Url</label>
                                                    <input type="text" required class="form-control" name="urls[]"
                                                        placeholder="Enter Button Url">
                                                </div>
                                            </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex flex-wrap">
                                        <button type="button" id="removeBtn" onclick="removeField()"
                                            class="btn btn-danger d-none mr-4">Remove Button</button>
                                        <button type="button" onclick="addField()" class="btn btn-primary mr-4">Add new
                                            Button</button>
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
        var btns = document.getElementById('buttons');
        function addField() {
            var btn = document.getElementById('button_1');
            var clone = btn.cloneNode(true);
            clone.id = `button_${btns.children.length + 1}`;
            btns.appendChild(clone);
            btnShowHide();
        }
        function btnShowHide() {
            var removeBtn = document.getElementById('removeBtn');
            if (btns.children.length > 1) {
                removeBtn.classList.add('d-block');
                removeBtn.classList.remove('d-none');
            } else {
                removeBtn.classList.remove('d-block');
                removeBtn.classList.add('d-none');
            }
        }
        function removeField() {
            var lastDiv = document.getElementById(`button_${btns.children.length}`);
            lastDiv.remove();
            btnShowHide();
        }
    </script>
@endsection