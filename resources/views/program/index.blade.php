@extends('layouts.auth')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Program
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
        <li class="active">Program</li>
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

          <a href="{{ route('program.store') }}" class="btn btn-success">Create program</a>
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr class="success">
                <th>No</th>
                <th>Program Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>PIC</th>
                <th colspan="2">Action</th>
              </tr>
              <?php $no = 0; ?>
              @foreach($programs as $data)
              <tr class="info">
                <td>{{$no += 1}}</td>
                <td>{{$data->program_name}}</td>
                <td>{{$data->description}}</td>
                <td>{{$data->price}}</td>
                <td>{{$data->user->name}}</td>
                <td><a href="{{ route('program.edit', [$data->id]) }}" class="btn btn-warning">Edit</a></td>
                <td>
                  <form class="" action="{{ route('program.destroy', [$data->id]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" name="button" onclick="return confirm('Apakah yakin menghapus program {{$data->program_name}}?')" class="btn btn-danger">Delete</button>
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
