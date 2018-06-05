@extends('layouts.auth')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Member
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
        <li class="active">Member</li>
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

          <a href="{{ route('member.store') }}" class="btn btn-success">Register member</a>
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr class="success">
                <th>No</th>
                <th>Full Name</th>
                <th>From</th>
                <th>Program</th>
                <th>Status</th>
                <th colspan="3">Action</th>
              </tr>
              <?php $no = 0; ?>
              @foreach($members as $data)
              <?php
                if ($data->status == "Alumni") {
                  $tr="default";
                }else {
                  $tr="info";
                }
              ?>
              <tr class='<?php echo $tr; ?>'>
                <td>{{$no += 1}}</td>
                <td width="20%">{{$data->name}}</td>
                <td>{{$data->come_from}}</td>
                <td>{{$data->program->program_name}}</td>
                <td>{{$data->status}}</td>
                <td width="5%"><a href="{{ route('member.detail', [$data->id]) }}" class="btn btn-primary">Detail</a></td>
                <td width="5%"><a href="{{ route('member.edit', [$data->id]) }}" class="btn btn-warning">Edit</a></td>
                <td width="5%">
                  <form class="" action="{{ route('member.destroy', [$data->id]) }}" method="post">
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
