@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
            @if (session()->has('message'))
                <div class="alert alert-success mt-4 ml-4 mr-4 " role="alert">
                    {{ session('message') }}
                </div>
            @endif
        <div class="card">
            <div class="card-header">
                <h4>Edit Product
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
            <form action="{{url('admin/products/'.$product->id)}}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="seotags-tab" data-bs-toggle="tab" data-bs-target="#seotags-tab-pane" type="button" role="tab" aria-controls="seotags-tab-pane" aria-selected="false">SEO Tags</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Details</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">Product Image</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">Product Color</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0"><div class="mb-3">
                        <div class="my-3">
                            <label for="category_id" class="form-label">Select Category</label>
                            <select class="form-select" name="category_id" id="category_id">
                                <option selected disabled>Select one</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected':''}} >
                                    {{$category->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" name="name" id="name" value="{{$product->name}}" class="form-control" placeholder="name" aria-describedby="helpId">
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{$product->slug}}"class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label">Select Brand</label>
                            <select class="form-select" name="brand" id="brand">
                                <option selected disabled>Select one</option>
                                @foreach($brands as $brand)
                                <option value="{{$brand->id}}" {{$brand->id == $product->brand ? 'selected':''}}>{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="small_description" class="form-label">Small Description</label>
                            <textarea class="form-control" name="small_description" id="small_description" rows="3">{{$product->small_description}}</textarea>
                        </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="4">{{$product->description}}</textarea>
                            </div>
                    </div>
                    <div class="tab-pane fade" id="seotags-tab-pane" role="tabpanel" aria-labelledby="seotags-tab" tabindex="0">
                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" value="{{$product->meta_title}}" class="form-control" placeholder="meta_title">
                        </div>  

                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control" name="meta_description" id="meta_description" rows="4">{{$product->meta_description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="meta_keyword" class="form-label">Meta Keyword</label>
                            <textarea class="form-control" name="meta_keyword" id="meta_keyword" rows="4">{{$product->meta_keyword}}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                        <div class="mb-3">
                            <div class="col-md-4">
                                <label for="original_price" class="form-label">Original Price</label>
                                <input type="text" name="original_price" id="original_price" value="{{$product->original_price}}" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="selling_price" class="form-label">Selling Price</label>
                                <input type="text" name="selling_price" id="selling_price" value="{{$product->selling_price}}" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" name="quantity" id="quantity" value="{{$product->quantity}}" class="form-control" placeholder="" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check mb-3">
                                <input class="form-check-input" name="trending" type="checkbox" value="" id="trending" {{$product->trending == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="trending">
                                    Trending
                                </label>
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Status</label> <br/>
                                <input type="checkbox" name="status" style="width:30px;height:30px">
                                Checked=Hidden;UnChecked=Visible.
                                </div>
                            </div>
                        </div>
                            <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                  <label for="image[]" class="form-label">Upload Product Images</label>
                                  <input type="file" class="form-control" multiple name="image[]" id="image" placeholder="" aria-describedby="">
                                </div>
                                @if($product->productImages)
                                <div class="row">
                                    @foreach($product->productImages as $image)
                                    <div class="col-md-2">
                                        <img src="{{asset($image->image)}}" class="me-4 border" alt="image" style="width:80px;height:80px">
                                        <a class="d-block" href="{{url('admin/product-image/'.$image->id.'/delete')}}" role="button">Remove</a>
                                    </div>
                                    @endforeach
                                </div>
                                   
                                @else
                                <h5>No Image Added</h5>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <h4>Add Product Color</h4>
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

                                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Color Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($product->productColors as $prodColor)
                            <tr class="prod-color-tr">
                                <td scope="row">
                                    @if($prodColor->color)
                                    {{$prodColor->color->name}}
                                    @else
                                    No Color Found
                                    @endif
                                </td>
                                <td  scope="row">
                                    <div class="input-group mb-3" style="width:150px">
                                      <input type="text"
                                        class="form-control form-control-sm productColorQuantity" value="{{$prodColor->quantity}}" >
                                          <button type="button" value="{{$prodColor->id}}" class="updateProductColor btn btn-sm text-white btn-primary">Update</button>
                                    </div>
                                </td>
                                <td scope="row">
                                           <button type="button" value="{{$prodColor->id}}" class="deleteProductColorBtn btn btn-sm text-white btn-danger">Delete</button>
                                </td>
            
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>


                        </div>
                        <button type="submit" name="" id="" class="btn btn-primary mt-2">Update</button>
                    </form>
                </div>
            </div>     
        </div>
    </div>
    @endsection

    @section('script')

    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $(document).on('click','.updateProductColor',function(){
                const product_id = "{{$product->id}}";
                const prod_color_id = $(this).val();
                const qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
                if(qty <= 0){
                    alert('quantity is required')
                    return false;
                }
                let data = {
                    'product_id':product_id,
                    'qty':qty
                }
                $.ajax({
                    type:"POST",
                    url:"/admin/product-color/"+prod_color_id,
                    data:data,
                    success:function(response){
                        alert(response.message)

                    }
                })
            })
            $(document).on('click','.deleteProductColorBtn',function(){
                let prod_color_id = $(this).val();
                let thisClick = $(this);
                
                $.ajax({
                    type:"GET",
                    url:"/admin/product-color/"+prod_color_id+"/delete",
                    success:function(response){
                        thisClick.closest('.prod-color-tr').remove();
                        alert(response.message)

                    }
                })
            });

        })
    </script>

    @endsection