@extends('layouts.auth')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Member
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
        <li class="active">Create member</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="box box-primary">
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('member.store.submit') }}">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Full name</label>
                  <input type="text" class="form-control" name="name" required>
                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="email">E-mail <i>(can't be changed)</i></label>
                  <input type="email" class="form-control" name="email" required>
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="come_from">Come from</label>
                  <input type="text" class="form-control" name="come_from" required>
                  @if ($errors->has('come_from'))
                      <span class="help-block">
                          <strong>{{ $errors->first('come_from') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <textarea name="address" rows="3" cols="80" required></textarea>
                  @if ($errors->has('address'))
                      <span class="help-block">
                          <strong>{{ $errors->first('address') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="phone_number">Phone number</label>
                  <input type="number" class="form-control" name="phone_number" placeholder="6281200001111" required>
                  @if ($errors->has('phone_number'))
                      <span class="help-block">
                          <strong>{{ $errors->first('phone_number') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="program_id">Program</label>
                  <select class="form-control" name="program_id" required>
                    <option value="">List program</option>
                    @foreach($programs as $data)
                      <option value="{{$data->id}}">{{$data->program_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" name="status" required>
                    <option value="">List status</option>
                    <option value="Alumni">Alumni</option>
                    <option value="Membership">Membership</option>
                  </select>
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
