@extends('admin.layout.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4 pb-4">
            <div class="card-header py-3 ">
                <h6 class="m-0 font-weight-bold text-primary">Home Page Resume Section</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.contact_section.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="container">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" required class="form-control" name="title"
                                        value="{{ isset($contact_section->title) ? $contact_section->title : '' }}" placeholder="Enter title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Description</label>
                                    <textarea name="desc" id="" class="w-100" required
                                        value="{{ isset($contact_section->description) ? $contact_section->description : '' }}">{{ isset($contact_section->description) ? $contact_section->description : '' }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Location Label</label>
                                    <input type="text" required class="form-control" name="location_txt"
                                        placeholder="Enter Location Label"
                                        value="{{ isset($contact_section) ? $contact_section->location_txt : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Location Url</label>
                                    <input type="text" required class="form-control" name="location_url"
                                        placeholder="Enter Location Url"
                                        value="{{ isset($contact_section) ? $contact_section->location_url : '' }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" required class="form-control" name="email"
                                        placeholder="Enter email"
                                        value="{{ isset($contact_section) ? $contact_section->email : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="tel" required class="form-control" name="phone"
                                        placeholder="Enter phone"
                                        value="{{ isset($contact_section) ? $contact_section->phone : '' }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Contact Button label</label>
                                    <input type="text" required class="form-control" name="button_txt"
                                        placeholder="Enter button label"
                                        value="{{ isset($contact_section) ? $contact_section->button_txt : '' }}">
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