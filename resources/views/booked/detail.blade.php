@extends('layouts.auth')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Detail Booked
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
      <li class="active">Detail booked</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <button type="button" name="button" onclick="history.back()" class="btn btn-danger">Back</button>
        <br><br>
        <div class="box-body table-responsive no-padding">
          <table class="table table-striped">
            <tr>
              <th width="20%">Full name</th>
              <td>{{$bookeds->full_name}}</td>
            </tr>
            <tr>
              <th>E-mail</th>
              <td>{{$bookeds->email}}</td>
            </tr>
            <tr>
              <th>Date of birth</th>
              <td>{{$bookeds->dob}}</td>
            </tr>
            <tr>
              <th>Gender</th>
              <td>{{$bookeds->gender}}</td>
            </tr>
            <tr>
              <th>Come from</th>
              <td>{{$bookeds->come_from}}</td>
            </tr>
            <tr>
              <th>Address</th>
              <td>{{$bookeds->address}}</td>
            </tr>
            <tr>
              <th>Phone number</th>
              <td>{{$bookeds->phone_number}}</td>
            </tr>
            <tr>
              <th>Program</th>
              <td>{{$bookeds->program->program_name}}</td>
            </tr>
            <tr>
              <th>Description</th>
              <td>{{$bookeds->description}}</td>
            </tr>
            <tr>
              <th>Created at</th>
              <td>{{$bookeds->created_at->format('d, M Y H:i')}}</td>
            </tr>
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
