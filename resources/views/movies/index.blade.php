@extends('app')

@section('content')
	<div class="container mt-5">
        <div class="row">
            @forelse($movies as $key => $movie)
                <div class="col-sm-6 col-md-4 col-xl-3 mb-4">
                    @include('movies.partials.movie', ['movie' => $movie, 'imageSize' => 270])
                </div>
            @empty
                <div class="col-12">
                    <p>No hay películas</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection