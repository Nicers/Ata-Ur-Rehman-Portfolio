@extends('admin.layout.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 ">
                <h6 class="m-0 font-weight-bold text-primary">Home Page About Section</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.about-store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="container">
                            <div class="row">
                                <div class="form-group col-md-6">
                                  div.d-flex
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Description</label>
                                    <textarea name="desc" id="" class="w-100 form-control" required
                                        value="{{ isset($about->description) ? $about->description : '' }}">{{ isset($about->description) ? $about->description : '' }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Select Image</label>
                                    <input type="file" class="form-control-file" name="image"
                                        onchange="document.getElementById('aboutImage').src=window.URL.createObjectURL(this.files[0])" />
                                </div>
                                <div class="form-group col-md-6">
                                    <img src="{{ isset($about->image) ? Storage::url($about->image) : null}}" alt="AboutUs Image"
                                        id="aboutImage" class="w-50 h-100">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Button Label</label>
                                    <input type="text" required class="form-control" name="button_txt" value="{{ isset($about) ? $about->button_txt : '' }}"
                                        placeholder="Enter Button Label">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Button Url</label>
                                    <input type="text" required class="form-control" name="button_url" value="{{ isset($about) ? $about->button_url : '' }}"
                                        placeholder="Enter Button Url">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                        <button type="submit" class="btn btn-success mr-4">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection