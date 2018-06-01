@extends('layouts.public_layout')
@section('content')
  <!-- Begin page content -->
  <main role="main" class="container">
    <h1 class="mt-5">{{$data->title}}</h1>
    <p class="text-muted"><i>@ {{$data->user->name}} - {{$data->created_at->format('d, M Y H:i')}}</i></p><br>
    <center><img src="{{asset($data->path_img)}}" alt="Image error"></center><br>
    <p class="lead">{{$data->description}}</p>
  </main>
@endsection
