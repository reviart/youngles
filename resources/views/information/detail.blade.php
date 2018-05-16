@extends('layouts.auth')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Detail Information
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
      <li class="active">Detail information</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <a href="{{ route('information.store') }}" class="btn btn-primary">Create new information</a>
        <a href="{{ route('information.edit', [$informations[0]->id]) }}" class="btn btn-warning">Edit this information</a>
        <button type="button" name="button" onclick="history.back()" class="btn btn-danger">Back</button>
        <br><br>
        <div class="box-body table-responsive no-padding">
          <table class="table table-striped">
            @foreach($informations as $data)
            <tr>
              <th width="20%">Title</th>
              <td>{{$data->title}}</td>
            </tr>
            <tr>
              <th>Description</th>
              <td>{{$data->description}}</td>
            </tr>
            <tr>
              <th>Path image</th>
              <td>{{$data->path_img}}</td>
            </tr>
            <tr>
              <td></td>
              <td><img src="{{asset($data->path_img)}}" alt="img error" width="500px"></td>
            </tr>
            <tr>
              <th>PIC</th>
              <td>{{$data->user->name}}</td>
            </tr>
            <tr>
              <th>Created at</th>
              <td>{{$data->created_at->format('d, M Y H:i')}}</td>
            </tr>
            <tr>
              <th>Updated at</th>
              <td>{{$data->updated_at->format('d, M Y H:i')}}</td>
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
