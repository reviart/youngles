@extends('layouts.auth')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Information
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
        <li class="active">Information</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
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

          <a href="{{ route('information.store') }}" class="btn btn-success">Create an information</a>
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr class="success">
                <th>No</th>
                <th>Title</th>
                <th>Description</th>
                <th>PIC</th>
                <th colspan="3">Action</th>
              </tr>
              <?php $no = 0; ?>
              @foreach($informations as $data)
              <tr class="info">
                <td>{{$no += 1}}</td>
                <td width="20%">{{substr($data->title,0,20)}}</td>
                <td>{{substr($data->description,0,50)}}...</td>
                <td>{{$data->user->name}}</td>
                <td width="5%"><a href="{{ route('information.detail', [$data->id]) }}" class="btn btn-primary">Detail</a></td>
                <td width="5%"><a href="{{ route('information.edit', [$data->id]) }}" class="btn btn-warning">Edit</a></td>
                <td width="5%">
                  <form class="" action="{{ route('information.destroy', [$data->id]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" name="button" onclick="return confirm('Are you sure will remove {{$data->title}} information?')" class="btn btn-danger">Delete</button>
                  </form>
                </td>
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
