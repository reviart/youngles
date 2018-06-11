@extends('layouts.auth')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Booked
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
        <li class="active">Booked</li>
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
          @endif
          <br>

          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr class="success">
                <th>No</th>
                <th>Full Name</th>
                <th>E-mail</th>
                <th>From</th>
                <th>Program</th>
                <th>Created at</th>
                <th colspan="3">Action</th>
              </tr>
              <?php $no = 0; ?>
              @foreach($bookeds as $data)
              <tr class="info">
                <td>{{$no += 1}}</td>
                <td width="20%">{{$data->full_name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->come_from}}</td>
                <td>{{$data->program->program_name}}</td>
                <td>{{$data->created_at->format('d, M Y H:i')}}</td>
                <td width="5%"><a href="{{ route('booked.detail', [$data->id]) }}" class="btn btn-primary">Detail</a></td>

                <td width="5%">
                  <form class="" action="{{ route('booked.move', [$data->id]) }}" method="get">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" name="button" onclick="return confirm('Are you sure to confirm {{$data->full_name}}?')" class="btn btn-success">Confirm</button>
                  </form>
                </td>

                <td width="5%">
                  <form class="" action="{{ route('booked.destroy', [$data->id]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" name="button" onclick="return confirm('Are you sure will remove {{$data->full_name}} data?')" class="btn btn-danger">Delete</button>
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
