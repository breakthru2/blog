@extends('layout')
@section('title', $title)
@section('meta_desc', $meta_desc)
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">All Categories</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Add
                <a href="{{url('admin/category/create')}}" class="float-end btn btn-sm btn-dark">Add Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data as $cat)
                        <tr>
                          <td>{{$cat->id}}</td>
                          <td>{{$cat->title}}</td>
                          <td><img src="{{ asset('imgs').'/'.$cat->image }}" width="50" /></td>
                          <td>
                            <a class="btn btn-info btn-sm" href="{{url('admin/category/'.$cat->id.'/edit')}}">Update</a>
                            <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/category/'.$cat->id.'/delete')}}">Delete</a>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              </div>
              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</main>
@endsection
                
          