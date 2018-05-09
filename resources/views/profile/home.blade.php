@extends('layouts.auth')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
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
        <div class="col-md-2">
          <?php
            if (Auth::user()->path_img == NULL) {
              $ava = asset('avatar.png');
            }
            else {
              $ava = Auth::user()->path_img;
            }
          ?>
          <img src="{{$ava}}" alt="avatar error" width="100px" class="img-responsive">
        </div>
        <div class="col-md-6">
          <table style="font-size:20px;">
            <tr>
              <th>Name</th>
              <td>: {{Auth::user()->name}}</td>
            </tr>
            <tr>
              <th>Email</th>
              <td>: {{Auth::user()->email}}</td>
            </tr>
            <tr>
              <th>Last login</th>
              <td>: {{Auth::user()->last_login}}</td>
            </tr>
          </table>
          <a href="{{ route('profile.edit', [$datas[0]->id]) }}" class="btn btn-primary">Edit profile</a>
        </div>
      </div>
      <!-- /.row -->
      <br>
      <div class="row">
        <div class="col-md-12">

          @if (session('success'))
              <div class="alert alert-success">
                <center>
                  {{ session('success') }}
                </center>
              </div>
          @elseif (session('warning'))
              <div class="alert alert-warning">
                <center>
                  {{ session('warning') }}
                </center>
              </div>
          @else
          @endif
          <br>

          <a href="{{ route('register') }}" class="btn btn-success">Register new stuff</a>
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr class="success">
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Job</th>
                <th>Last login</th>
              </tr>
              <?php $no = 0; ?>
              @foreach($datas as $data)
              <tr class="info">
                <td>{{$no += 1}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->job}}</td>
                <td>{{$data->last_login}}</td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
