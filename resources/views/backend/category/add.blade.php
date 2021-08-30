@extends('layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Add
                <a href="{{url('admin/category')}}" class="float-end btn btn-sm btn-dark">All Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
  
                  @if($errors)
                    @foreach($errors->all() as $error)
                      <p class="text-danger">{{$error}}</p>
                    @endforeach
                  @endif
  
                  @if(Session::has('success'))
                  <p class="text-success">{{session('success')}}</p>
                  @endif
  
                  <form method="post" action="{{url('admin/category')}}" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td><input type="text" name="title" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td><input type="text" name="detail" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td><input type="file" name="cat_image" class="form-control"/></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="btn btn-primary" />
                            </td>
                        </tr>
                    </table>
                  </form>
                </div>
              </div>
        </div>
    </div>
</main>
@endsection
               
            