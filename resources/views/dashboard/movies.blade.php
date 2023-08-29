@extends('app')

@section('content')

	<div class="container mt-4">
		<div class="d-flex align-items-center">
			<p class="mb-0 ml-2">Movie</p><hr>
        </div>

		<div class="input-group mb-3">
		  <span class="input-group-text" id="basic-addon1">Name:</span>
		  <input type="text" class="form-control" aria-label="Movie name">
		</div>

		<div class="input-group mb-3">
		  <span class="input-group-text" id="basic-addon1">Director:</span>
		  <input type="text" class="form-control" aria-label="Movie name">
		</div>

		<div class="input-group mb-3">
		  <span class="input-group-text" id="basic-addon1">Duration:</span>
		  <input type="text" class="form-control" aria-label="Movie name">
		</div>

		<div class="input-group mb-3">
		  <span class="input-group-text" id="basic-addon1">Clasification:</span>
		  <input type="text" class="form-control" aria-label="Movie name">
		</div>

		<div class="input-group mb-3">
		  <span class="input-group-text" id="basic-addon1">Exhibited from:</span>
		  <input type="text" class="form-control" aria-label="Movie name">
		</div>

		<div class="input-group mb-3">
		  <span class="input-group-text" id="basic-addon1">Exhibited until:</span>
		  <input type="text" class="form-control" aria-label="Movie name">
		</div>

		<input class="btn btn-primary" type="submit" value="Submit">
	</div>

@endsection