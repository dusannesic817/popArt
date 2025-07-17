@props(['product'])

<a href="{{ route('products.show', parameters: $product) }}" class="text-decoration-none">
    <div class="card h-100">
       <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/images/no-image.png') }}" class="card-img-top img-fluid" alt="...">
        <div class="card-body">
            <p class="card-text">{{ $product->title }}</p>
            <small class="text-muted">Price: {{ $product->price }}$</small>
        </div>
    </div>
</a>

