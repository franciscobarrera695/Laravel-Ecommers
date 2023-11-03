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
                    <h4>Colors
                        <a href="{{ url('admin/colors/create') }}" class="btn btn-primary btn-small float-end"> Add
                            Color</a>
                    </h4>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">name</th>
                                <th scope="col">code</th>
                                <th scope="col">status</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($colors as $color)
                            <tr class="">
                                <td scope="row">{{$color->id}}</td>
                                <td scope="row">{{$color->name}}</td>
                                <td scope="row">{{$color->code}}</td>
                                <td scope="row">{{$color->status == '1' ? 'hidden' : 'visible'}}</td>
                                <td scope="row">
                                <a name="edit" id="edit" class="btn btn-secondary" href="{{url('admin/colors/'.$color->id.'/edit')}}" role="button">Edit</a>
                                <a name="delete" id="delete" onClick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-danger" href="{{url('admin/colors/'.$color->id.'/delete')}}" role="button">Delete</a>
                                

                                </td>

                            </tr>
                            @empty
                            <tr class="">
                                <td scope="row">No Colors Available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                

                </div>
            </div>
        </div>
    @endsection
