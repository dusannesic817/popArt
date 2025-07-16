@props(['product'])

<a href="{{ route('products.show', $product) }}">
    <div class="card card-fixed-height d-flex flex-column" style="height: 300px;">
        <div class="card-body p-2 d-flex align-items-center justify-content-center">
            <img src="..." class="img-fluid" alt="..."
                style="max-height: 100%; max-width: 100%; object-fit: contain;">
        </div>
        <div class="card-footer bg-white border-0 ">
            <div><strong>{{$product->title}}</strong></div>
            <small class="text-muted">Price: {{$product->price}}$</small>
        </div>
    </div>
</a>
