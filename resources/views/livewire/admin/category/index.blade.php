<div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Category
                    <a href="{{url('admin/category/create')}}" class="btn btn-primary btn-small float-end"> Add category</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">name</th>
                                <th scope="col">status</th>
                                <th scope="col">action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            
                            <tr >
                                <td scope="row">{{$category->id}}</td>
                                <td scope="row">{{$category->name}}</td>
                                <td scope="row">{{$category->status === '1' ? 'Hidden' : 'Visible'}}</td>
                                <td scope="row">
                                <a name="edit" id="edit" class="btn btn-secondary" href="{{url('admin/category/'.$category->id.'/edit')}}" role="button">edit</a>
                                    <form class='d-inline' id="form-delete" action="{{url('admin/category/'.$category->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" onClick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-danger">delete</button>
                                    </form>

                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
                
            </div>
        </div>
    </div>
</div>


