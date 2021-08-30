@extends('layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Post</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Add
                <a href="{{url('admin/post')}}" class="float-end btn btn-sm btn-dark">All Data</a>
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
  
                  <form method="post" action="{{url('admin/post')}}" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Category<span class="text-danger">*</span></th>
                            <td>
                                <select name="category" class="form-select">
                                    @foreach ($cats as $cat)
                                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Title<span class="text-danger">*</span></th>
                            <td><input type="text" name="title" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Thumbnail</th>
                            <td><input type="file" name="post_image" class="form-control"/></td>
                        </tr>
                        <tr>
                            <th>Full Image</th>
                            <td><input type="file" name="post_thumb" class="form-control"/></td>
                        </tr>
                        <tr>
                            <th>Detail<span class="text-danger">*</span></th>
                            <td>
                                <textarea name="detail" class="form-control"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>Tags</th>
                            <td>
                                <textarea name="tags" class="form-control"></textarea>
                            </td>
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
               
            