<a href="{{ $movie->slug }}">
    <h6 class="text-truncate mb-2">{{ $movie->title }}</h6>
    <p class="card-detail">
        <i class="fa fa-clock-o" aria-hidden="true"></i>
        {{ $movie->exhibited_until }}
    </p>
    <img src="" class="my-2 image-card image-card--md">
    <p class="card-excerpt">{{ $movie->director }}</p>
</a>
