@extends('admin.layouts.app')

@section('content')
    @if(session('update'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">Success</span>
            You successfully {{session('update')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>First Content</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('admin_dashboard')}}">Dashboard</a></li>
                        <li><a href="{{route('home_first')}}">First Content</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>First Content</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{route('update_home_content',$first_content->id)}}" id="update_content{{$first_content->id}}"  method="post"  class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Main Title</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="main_title"  value="{{$first_content->main_title}}"  class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Title</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="title"  value="{{$first_content->title}}"  class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Description</label></div>
                        <div class="col-12 col-md-9">
                            <textarea type="text" id="text-input" name="description" rows="10"  class="form-control">{{$first_content->description}}</textarea>
                        </div>
                    </div>
                </form>
                <div class="card-footer">
                    <button  form="update_content{{$first_content->id}}" class="btn btn-success btn-sm">
                        Update
                    </button>
                </div>
            </div>

        </div>
    </div>
@endsection
