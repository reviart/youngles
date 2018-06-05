@extends('layouts.public_layout')

@section('content')
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Pricing</h1>
      <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
    </div>

    <div class="container">

      @foreach($programs->chunk(3) as $chunk)
      <div class="card-deck mb-3 text-center">
        @foreach($chunk as $item)
          <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h5 class="my-0 font-weight-normal">{{$item->program_name}}</h5>
          </div>
          <div class="card-body">
            <h2 class="card-title pricing-card-title">{{$item->price}} IDR <small class="text-muted">/ period</small></h2>
            <ul class="list-unstyled mt-3 mb-4">
              {{--<li>10 users included</li>--}}
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Register now!</button>
          </div>
        </div>
        @endforeach
      </div>
      @endforeach

@endsection
