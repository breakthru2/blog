@extends('layout')
@section('title', $title)
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">All Posts</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Posts
                <a href="{{url('admin/post/create')}}" class="float-end btn btn-sm btn-dark">Add Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Full Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Full Image</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data as $post)
                        <tr>
                          <td>{{$post->id}}</td>
                          <td>{{$post->title}}</td>
                          <td><img src="{{ asset('imgs/thumb').'/'.$post->thumb }}" width="100" /></td>
                          <td><img src="{{ asset('imgs/full').'/'.$post->full_img }}" width="100" /></td>
                          <td>
                            <a class="btn btn-info btn-sm" href="{{url('admin/post/'.$post->id.'/edit')}}">Update</a>
                            <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/post/'.$post->id.'/delete')}}">Delete</a>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              </div>
        </div>
    </div>
</main>
@endsection
                
          