@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
                <div class="alert alert-success ml-4 mr-4 " role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Slider List
                        <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-small float-end"> Add
                            Slider</a>
                    </h4>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">image</th>

                                <th scope="col">status</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($sliders as $slider)
                            <tr class="">
                                <td scope="row">{{$slider->id}}</td>
                                <td scope="row">{{$slider->title}}</td>
                                <td scope="row">{{$slider->description}}</td>

                                <td scope="row">
                                    <img src="{{asset("$slider->image")}}" alt="Slider" style="width:70px;height:70px">
                                </td>
                                <td scope="row">{{$slider->status == '1' ? 'hidden' : 'visible'}}</td>
                                <td scope="row">
                                <a name="edit" id="edit" class="btn btn-secondary" href="{{url('admin/sliders/'.$slider->id.'/edit')}}" role="button">Edit</a>
                                <a name="delete" id="delete" onClick="return confirm('Are you sure, you want to delete this Slider?')" class="btn btn-danger" href="{{url('admin/sliders/'.$slider->id.'/delete')}}" role="button">Delete</a>
                                

                                </td>

                            </tr>
                            @empty
                            <tr class="">
                                <td scope="row">No Sliders Available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                

                </div>
            </div>
        </div>
    @endsection
