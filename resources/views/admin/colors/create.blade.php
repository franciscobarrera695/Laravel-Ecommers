@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Create Colors
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
            <form action="{{url('admin/colors/create')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="name" aria-describedby="helpId">
                  <small id="helpId" class="text-muted">Help text</small>
                </div>
                <div class="mb-3">
                  <label for="code" class="form-label">Code</label>
                  <input type="text" name="code" id="code" class="form-control" placeholder="code" aria-describedby="helpId">
                  <small id="helpId" class="text-muted">Help text</small>
                </div>
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="" name="status" id="status">
                  <label class="form-check-label" for="status">
                    Default checkbox
                  </label>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button> 
                </div>
            </form>

            </div>     
        </div>
    </div>
    @endsection