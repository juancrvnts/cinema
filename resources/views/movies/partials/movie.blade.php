<a href="{{ $movie->url }}">
    <h6 class="text-truncate mb-2">{{ $movie->title }}</h6>
    <p class="card-detail">
        <i class="fa fa-clock-o" aria-hidden="true"></i>
        {{ $movie->exhibited_until }}
    </p>
    <p class="card-excerpt">{{ $movie->excerpt }}</p>
</a>
