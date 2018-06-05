@extends('layouts.auth')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Program
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
        <div class="col-md-6 col-md-offset-3">
          <div class="box box-primary">
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('program.store.submit') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="program_name">Program name</label>
                  <input type="text" class="form-control" name="program_name" required>
                  @if ($errors->has('program_name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('program_name') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea name="description" rows="8" cols="80" required></textarea>
                  @if ($errors->has('description'))
                      <span class="help-block">
                          <strong>{{ $errors->first('description') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" class="form-control" name="price" placeholder="1000000" required>
                  @if ($errors->has('price'))
                      <span class="help-block">
                          <strong>{{ $errors->first('price') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="path_img">Picture <i>(perspective)</i></label>
                  <input type="file" name="path_img">
                  <span class="help-block text-danger">{{ $errors->first('path_img') }}</span>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" onclick="return confirm('Is the data filled correctly?')" class="btn btn-primary">
                    Create
                </button>
                <button type="button" name="button" onclick="history.back()" class="btn btn-warning">Cancel</button>
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
