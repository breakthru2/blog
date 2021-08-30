@extends('layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add post</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Update Post
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
  
                  <form method="post" action="{{url('admin/post/'.$data->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <table class="table table-bordered">
                        <tr>
                            <th>Category<span class="text-danger">*</span></th>
                            <td>
                                <select class="form-control" name="category">
                                  @foreach($cats as $cat)
                                    @if($cat->id==$data->cat_id)
                                    <option selected value="{{$cat->id}}">{{$cat->title}}</option>
                                    @else
                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                    @endif
                                  @endforeach
                                </select>
                              </td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td><input type="text" name="title" value="{{$data->title}}" class="form-control" /></td>
                        </tr> 
                        <tr>
                            <th>Thumb</th>
                            <td>
                                <p class="my-2"><img width="80" src="{{asset('imgs/thumb')}}/{{$data->thumb}}" alt=""></p>
                                <input type="hidden" value="{{$data->thumb}}" name="post_thumb">
                                <input type="file" name="post_thumb" />
                            </td>
                        </tr>
                        <tr>
                            <th>Full Image</th>
                            <td>
                                <p class="my-2"><img width="80" src="{{asset('imgs/full')}}/{{$data->full_img}}" alt=""></p>
                                <input type="hidden" value="{{$data->full_img}}" name="post_image">
                                <input type="file" name="post_image" />
                            </td>
                        </tr>
                        <tr>
                            <th>Detail<span class="text-danger">*</span></th>
                            <td>
                                <textarea name="detail" class="form-control">{{$data->detail}}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>Tags</th>
                            <td>
                                <textarea name="tags" class="form-control">{{$data->tags}}</textarea>
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
              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</main>
@endsection
               
           
