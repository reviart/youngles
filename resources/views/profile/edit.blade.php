@extends('layouts.auth')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Profile
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <?php
            if (Auth::user()->path_img == NULL) {
              $ava = asset('avatar.png');
            }
            else {
              $ava = Auth::user()->path_img;
            }
          ?>
          <div class="box box-primary">
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('profile.edit.submit', [$datas->id]) }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Full name</label>
                  <input type="text" class="form-control" id="name" value="{{$datas->name}}" name="name">
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email" value="{{$datas->email}}" name="email">
                </div>
                <div class="form-group">
                  <label for="job">Job</label>
                  <input type="text" class="form-control" id="job" value="{{$datas->job}}" name="job">
                </div>
                <div class="form-group">
                  <label for="avatar">Avatar</label>
                  <img src="{{$ava}}" alt="avatar error" width="100px" class="img-responsive">
                  <input type="file" id="avatar" name="path_img">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('profile.home')}}" class="btn btn-warning">Cancel</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
