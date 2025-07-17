<x-layout>
    <div class="container">
        <div class="row mt-5">
            <div class="row border-bottom mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-end gap-3 mb-3">
                        <a href="{{ route('products.create') }}" class="text-decoration-none">Add Product</a>
                        <div><a href="" class="text-decoration-none">Edit Profile</a></div>
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="col-2 p-0">
                <aside class="vh-100 overflow-auto ">
                    @foreach ($categories as $category)
                        <x-sidebar :category="$category" />
                    @endforeach
                </aside>
            </div>
            <div class="col-10">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-12 mb-3">
                            <div class="card" style="max-width: 700px;">
                                <div class="row g-0 h-100">
                                    <div class="col-md-4">
                                        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/images/no-image.png') }}"
                                            class="img-fluid rounded-start h-100 object-fit-cover" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <a href="{{ route('products.show', $product) }}"
                                                class="text-decoration-none">
                                                <h5 class="card-title">{{ $product->title }}</h5>
                                            </a>
                                            <p>Price: {{ $product->price }}</p>
                                            <p class="card-text">{{ Str::before($product->description, '.') }}.</p>
                                            <div class="d-flex justify-content-end gap-3">
                                                <a href="{{ route('products.edit', $product) }}"
                                                    class="text-decoration-none">Edit</a>
                                                <form method="POST" action="{{ route('products.destroy', $product) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-red">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-layout>
