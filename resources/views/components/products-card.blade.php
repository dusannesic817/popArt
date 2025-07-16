@props(['product'])

<a href="{{ route('products.show', $product) }}" class="text-decoration-none">
<div class="card card-fixed-height d-flex flex-column" style="height: 300px;">
    <div class="flex-grow-1 d-flex align-items-center justify-content-center p-0">
        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/images/no-image.png') }}"
             alt="..."
             style="width: 100%; height: 100%; object-fit: contain;">
    </div>

    <div class="card-footer bg-white border-0">
        <div><strong>{{ $product->title }}</strong></div>
        <small class="text-muted">Price: {{ $product->price }}$</small>
    </div>
</div>


</a>
