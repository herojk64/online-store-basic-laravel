<div x-data="{ rating: @entangle('rating'), hoverRating: 0 }" class="d-flex align-items-center gap-2">
    @for ($i = 1; $i <= 5; $i++)
        <svg
            @mouseover="hoverRating = {{ $i }}"
            @mouseleave="hoverRating = 0"
            @click="rating = {{ $i }}; $wire.rate({{ $i }})"
            :class="hoverRating >= {{ $i }} || rating >= {{ $i }} ? 'text-warning' : 'text-secondary'"
            class="bi bi-star-fill cursor-pointer"
            width="32" height="32" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.396.198-.86-.149-.746-.592L4.73 10.02.852 6.765c-.33-.314-.158-.888.283-.95l4.898-.696L7.538.792a.513.513 0 0 1 .924 0l2.205 4.327 4.898.696c.441.062.613.636.283.95l-3.878 3.255 1.863 4.831c.114.443-.35.79-.746.592L8 13.187l-4.389 2.256z"/>
        </svg>
    @endfor
</div>

@if (session()->has('message'))
    <div class="text-success">{{ session('message') }}</div>
@endif
