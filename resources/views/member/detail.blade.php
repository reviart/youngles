@extends('layouts.auth')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Detail Member
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
      <li class="active">Detail member</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <a href="{{ route('member.store') }}" class="btn btn-primary">Register new member</a>
        <a href="{{ route('member.edit', [$members->id]) }}" class="btn btn-warning">Edit this member</a>
        <button type="button" name="button" onclick="history.back()" class="btn btn-danger">Back</button>
        <br><br>
        <div class="box-body table-responsive no-padding">
          <table class="table table-striped">
            <tr>
              <th width="20%">Full name</th>
              <td>{{$members->name}}</td>
            </tr>
            <tr>
              <th>E-mail</th>
              <td>{{$members->email}}</td>
            </tr>
            <tr>
              <th>Come from</th>
              <td>{{$members->come_from}}</td>
            </tr>
            <tr>
              <th>Address</th>
              <td>{{$members->address}}</td>
            </tr>
            <tr>
              <th>Phone number</th>
              <td>{{$members->phone_number}}</td>
            </tr>
            <tr>
              <th>Program</th>
              <td>{{$members->program->program_name}}</td>
            </tr>
            <tr>
              <th>Status</th>
              <td>{{$members->status}}</td>
            </tr>
            <tr>
              <th>PIC</th>
              <td>{{$members->user->name}}</td>
            </tr>
            <tr>
              <th>Created at</th>
              <td>{{$members->created_at->format('d, M Y H:i')}}</td>
            </tr>
            <tr>
              <th>Updated at</th>
              <td>{{$members->updated_at->format('d, M Y H:i')}}</td>
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
