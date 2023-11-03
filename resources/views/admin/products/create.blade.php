@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Create Product
                    <a href="{{url('admin/products')}}" class="btn btn-secondary btn-small float-end">Back</a>
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
            <form action="{{url('admin/products')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="seotags-tab" data-bs-toggle="tab" data-bs-target="#seotags-tab-pane" type="button" role="tab" aria-controls="seotags-tab-pane" aria-selected="false">seotags</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">details</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">image</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">Color</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0"><div class="mb-3">
                        <div class="my-3">
                            <label for="category_id" class="form-label">Select Category</label>
                            <select class="form-select" name="category_id" id="category_id">
                                <option selected disabled>Select one</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="name" aria-describedby="helpId">
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label">Select Brand</label>
                            <select class="form-select" name="brand" id="brand">
                                <option selected disabled>Select one</option>
                                @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="small_description" class="form-label">Small Description</label>
                            <textarea class="form-control" name="small_description" id="small_description" rows="3"></textarea>
                        </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                            </div>
                    </div>
                    <div class="tab-pane fade" id="seotags-tab-pane" role="tabpanel" aria-labelledby="seotags-tab" tabindex="0">
                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="meta_title">
                        </div>  

                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control" name="meta_description" id="meta_description" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="meta_keyword" class="form-label">Meta Keyword</label>
                            <textarea class="form-control" name="meta_keyword" id="meta_keyword" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                        <div class="mb-3">
                            <div class="col-md-4">
                                <label for="original_price" class="form-label">Original Price</label>
                                <input type="text" name="original_price" id="original_price" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="selling_price" class="form-label">Selling Price</label>
                                <input type="text" name="selling_price" id="selling_price" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check mb-3">
                                <input class="form-check-input" name="trending" type="checkbox" value="" id="trending">
                                <label class="form-check-label" for="trending">
                                    Trending
                                </label>
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-check mb-3">
                                <input class="form-check-input" name="status" type="checkbox" value="" id="status">
                                <label class="form-check-label" for="status">
                                    Status
                                    </label>
                                </div>
                            </div>
                        </div>
                            <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                  <label for="image[]" class="form-label">Upload Product Images</label>
                                  <input type="file" class="form-control" multiple name="image[]" id="image" placeholder="" aria-describedby="">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">

                                <div class="mb-3">
                                <label class="form-check-label" for="">
                                    Select Colors
                                  </label>
                                  <div class="row">
                                    @forelse($colors as $color)
                                    <div class="col-md-3">
                                    
                                    <div class="p-2 border mb-3">
                                    Color: <input type="checkbox" name="colors[{{$color->id}}]" value="{{$color->id}}" id=""/> 
                                        {{$color->name}}
                                        <br/>
                                        Quantity: <input type="number" name="colorquantity[{{$color->id}}]" style="width:70px;border:1px solid"/>
                                    
                                    </div>

                                    </div>

                                    @empty
                                    <div class="col-md-12">
                                        <h1>No Colors found</h1>
                                    </div>
                                    @endforelse
                                  </div>
                                  
                                </div>
                                
                            </div>
                        </div>
                        <button type="submit" name="" id="" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>     
        </div>
    </div>
    @endsection