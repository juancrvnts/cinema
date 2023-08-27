@extends('app')

@section('content')

    <div class="container mt-4">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-4 mt-lg-0 mt-3">
                <h4 class="card-title text-warning-dark font-weight-light text-break">{{ $movie->present()->title }}</h4>
                <div class="mt-3">
                    <div class="d-flex align-items-center">
                        <p class="mb-0 ml-2">Director:</p>
                    </div>
                    <h5 class="card-title font-weight-light text-break mt-1">{{ $movie->present()->director }}</h5>
                </div>
                <div class="mt-3">
                    <div class="d-flex align-items-center">
                        <p class="mb-0 ml-2">Duración:</p>
                    </div>
                    <h5 class="card-title font-weight-light mt-1">{{ $movie->present()->duration }}</h5>
                </div>
                <div class="mt-3">
                    <div class="d-flex align-items-center">
                        <p class="mb-0 ml-2">Clasificación:</p>
                    </div>
                    <h5 class="card-title font-weight-light mt-1">{{ $movie->present()->clasification }}</h5>
                </div>
                <div class="mt-3">
                    <div class="d-flex align-items-center">
                        <p class="mb-0 ml-2">Se exhibe hasta:</p>
                    </div>
                    <h5 class="card-title font-weight-light mt-1">{{ $movie->present()->exhibitedUntil }}</h5>
                </div>
            </div>
            <div class="col-lg-8">
                <img src="{{ $movie->present()->single_image }}" class="img-fluid mt-2 mt-lg-0" alt="{{ $movie->present()->title }}">
            </div>
        </div>
    </div>

@endsection
