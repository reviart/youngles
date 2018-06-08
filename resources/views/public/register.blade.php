@extends('layouts.public_layout')

@section('content')
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto">
      <h1 class="display-4">Register</h1>
      <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example.</p>
      <br>
      @if (session('success'))
          <div class="alert alert-success">
            <center>
              {{ session('success') }}
            </center>
          </div>
      @endif
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto">
      <!-- form start -->
      <form role="form" method="POST" action="{{ route('public.register.submit') }}">
        {{ csrf_field() }}
          <div class="form-group row">
            <label for="full_name" class="col-sm-2 col-form-label">Full name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="full_name" required autocomplete="off" autofocus>
              @if ($errors->has('full_name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('full_name') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" required autocomplete="off">
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="dob" class="col-sm-2 col-form-label">Date of birth</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="dob" required>
              @if ($errors->has('dob'))
                  <span class="help-block">
                      <strong>{{ $errors->first('dob') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
            <select class="form-control" name="gender" required>
              <option value="">List gender</option>
              <option value="Man">Man</option>
              <option value="Woman">Woman</option>
            </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="come_from" class="col-sm-2 col-form-label">Come from</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="come_from" required autocomplete="off">
              @if ($errors->has('come_from'))
                  <span class="help-block">
                      <strong>{{ $errors->first('come_from') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
              <textarea name="address" rows="3" cols="75" required autocomplete="off"></textarea>
              @if ($errors->has('address'))
                  <span class="help-block">
                      <strong>{{ $errors->first('address') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="phone_number" class="col-sm-2 col-form-label">Phone number</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="phone_number" placeholder="ex : 628120000xxxx" required autocomplete="off">
              @if ($errors->has('phone_number'))
                  <span class="help-block">
                      <strong>{{ $errors->first('phone_number') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="program_id" class="col-sm-2 col-form-label">Program</label>
            <div class="col-sm-10">
            <select class="form-control" name="program_id" required>
              <option value="">List program</option>
              @foreach($programs as $data)
                <option value="{{$data->id}}">{{$data->program_name}}</option>
              @endforeach
            </select>
            </div>
          </div>
        <div class="row">
          <div class="col-sm-2">
          </div>
          <div class="col-sm-10">
            <button type="submit" onclick="return confirm('Is the data filled correctly?')" class="btn btn-primary">
                Register
            </button>
          </div>
        </div>
      </form>
    </div>

@endsection
