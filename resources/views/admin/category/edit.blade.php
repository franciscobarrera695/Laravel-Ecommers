@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Category
                    <a href="{{url('admin/category')}}" class="btn btn-secondary btn-small float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
               <form action="{{url('admin/category/'.$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
               <div class="row justify-content-center align-items-center g-2">
                <div class="col-md-6 mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" id="name" value="{{$category->name}}" class="form-control" placeholder="Name">
                  @error('name') <small class="text-danger">{{$message}}</small>@enderror
                </div>
                <div class="col-md-6 mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" name="slug" id="slug" value="{{$category->slug}}" class="form-control" placeholder="Slug">
                  @error('name') <small class="text-danger">{{$message}}</small>@enderror

                </div>
                <div class="col-md-6 mb-3">
                  <label for="description"  class="form-label">Description</label>
                  <input type="text" name="description" id="description" value="{{$category->description}}" class="form-control" placeholder="Description">
                  @error('name') <small class="text-danger">{{$message}}</small>@enderror

                </div>
                <div class="col-md-6 mb-3">
                  <label for="" class="form-label">Choose file</label>
                  <input type="file" class="form-control" name="image" id="image" placeholder="image" aria-describedby="fileHelpId">
                  <img src="{{asset('/uploads/category/'.$category->image)}}" alt="" width="60px" height="60px">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Status</label> <br/>
                    <input type="checkbox" name="status" {{$category->status ? 'checked' : ''}} style="width:30px;height:30px">
                    Checked=Hidden;UnChecked=Visible.
                </div>
                <h5>Seo Tags</h5>
                <div class="col-md-12 mb-3">
                  <label for="description" class="form-label">Meta_title</label>
                  <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{$category->meta_title}}" placeholder="meta_title">
                  @error('name') <small class="text-danger">{{$message}}</small>@enderror

                </div>
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">meta_keyword</label>
                    <input type="text" name="meta_keyword" id="meta_keyword" class="form-control" value="{{$category->meta_keyword}}" placeholder="meta_keyword">
                  @error('name') <small class="text-danger">{{$message}}</small>@enderror

                </div>
                <div class="col-md-12 mb-3">
                  <label for="description" class="form-label">meta_description</label>
                  <input type="text" name="meta_description" id="meta_description" class="form-control" value="{{$category->meta_description}}" placeholder="meta_description">
                  @error('name') <small class="text-danger">{{$message}}</small>@enderror

                </div>
                <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>

                </div>
               </form>
                </div>     
            </div>
        </div>
    </div>
</div>

@endsection