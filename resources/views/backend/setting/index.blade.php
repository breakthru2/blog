@extends('layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Manage Settings</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
               Manage Settings
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
  
                  <form method="post" action="{{url('admin/setting')}}" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                       
                            <th>Comment Auto Approve</th>
                            <td><input @if($setting) value="{{$setting->comment_auto}}" @endif type="text" name="comment_auto" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>User Auto Approve</th>
                            <td><input @if($setting) value="{{$setting->user_auto}}" @endif type="text" name="user_auto" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Recent Post Limit</th>
                            <td><input type="text" @if($setting) value="{{$setting->recent_limit}}" @endif name="recent_limit" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Popular Post Limit</th>
                            <td><input @if($setting) value="{{$setting->popular_limit}}" @endif type="text" name="popular_limit" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Recent Comments Limit</th>
                            <td><input @if($setting) value="{{$setting->recent_comment_limit}}" @endif type="text" name="recent_comment_limit" class="form-control" /></td>
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
               
            