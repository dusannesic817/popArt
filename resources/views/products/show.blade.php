<x-layout>
    <div class="container">
        <div class="row mt-5">
            <!-- Sidebar -->
            <div class="col-2 p-0">
                <aside class="vh-100 overflow-auto ">
                    @foreach ($categories as $category)
                        <x-sidebar :category="$category" />
                    @endforeach
                </aside>
            </div>
            <div class="col-8">
                <div class="card mb-3">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/images/no-image.png') }}"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title mb-0">{{ $product->title }}</h5>
                            <div>Location: {{ $product->user->location }}</div>
                        </div>
                        <p>Price: {{ $product->price }}$</p>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><small class="text-body-secondary">{{ $product->user->name }}
                                {{ $product->user->phone }}</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
