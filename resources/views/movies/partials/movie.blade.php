<a href="{{ $movie->present()->url }}">
    <h6 class="text-truncate mb-2">{{ $movie->present()->title }}</h6>
    <p class="card-detail">
        <i class="fa fa-clock-o" aria-hidden="true"></i>
        {{ $movie->present()->valid_to }}
    </p>
    <img src="{{ $movie->present()->featured_image(255) }}" class="my-2 image-card image-card--md benefit--image-{{ $movie->category_id }}" alt="{{ $movie->present()->title }}">
    <p class="card-excerpt">{{ $movie->present()->excerpt }}</p>
</a>
