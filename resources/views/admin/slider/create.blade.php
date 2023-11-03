@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Create Sliders
                    <a href="{{url('admin/colors')}}" class="btn btn-secondary btn-small float-end">Back</a>
                </h4>
            </div>

            @if($errors->any())
                <div class="alert alert-warning">
                    @foreach($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif

            <div class="card-body">
            <form action="{{url('admin/sliders/create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="title">
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea name="description" id="description" class="form-control" placeholder="description" rows="3"></textarea>
                </div>
                <div class="mb-3">
                  <label for="image" class="form-label">image</label>
                  <input type="file" name="image" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Status</label> <br/>
                    <input type="checkbox" name="status" style="width:30px;height:30px">
                    Checked=Hidden;UnChecked=Visible.
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button> 
                </div>
            </form>

            </div>     
        </div>
    </div>
    @endsection