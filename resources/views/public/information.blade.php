@extends('layouts.public_layout')

@section('content')
<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">YL informations</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
      @foreach($informations->chunk(3) as $chunk)
      <div class="row">
        @foreach($chunk as $item)
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="{{asset($item->path_img)}}" alt="Card image cap" height="230px" width="350px">
            <div class="card-body">
              <p class="card-text">{{substr($item->title, 0, 50)}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{ route('public.detailinformation', [$item->id]) }}" class="btn btn-sm btn-outline-primary">View</a>
                </div>
                <small class="text-muted">{{$item->created_at->format('d, M Y H:i')}}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      @endforeach
    </div>
  </div>

</main>
@endsection
