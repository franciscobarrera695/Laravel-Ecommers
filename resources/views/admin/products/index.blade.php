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
                    <h4>Products
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-small float-end"> Add
                            Product</a>
                    </h4>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Category</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quatity</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                            <tr class="">
                                <td scope="row">{{$product->id}}</td>
                                <td scope="row">
                                    @if($product->category)
                                        {{$product->category->name}}
                                    @else
                                        No Category
                                    @endif
                                </td>
                                <td scope="row">{{$product->name}}</td>
                                <td scope="row">{{$product->selling_price}}</td>
                                <td scope="row">{{$product->quantity}}</td>
                                <td scope="row">{{$product->status == '1' ? 'hidden' : 'visible'}}</td>
                                <td scope="row">
                                <a name="edit" id="edit" class="btn btn-secondary" href="{{url('admin/products/'.$product->id.'/edit')}}" role="button">Edit</a>
                                <a name="delete" id="delete" onClick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-danger" href="{{url('admin/products/'.$product->id.'/delete')}}" role="button">Delete</a>
                                

                                </td>

                            </tr>
                            @empty
                            <tr class="">
                                <td scope="row">No Products Available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                

                </div>
            </div>
        </div>
    @endsection
