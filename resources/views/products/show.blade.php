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

            <!-- Content -->
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/images/no-image.png') }}"
                                    class="img-fluid w-100" alt="Product Image"
                                    style="object-fit: contain; max-height: 400px;">
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-4 ms-auto">
                                <div class="d-flex flex-column mb-3">
                                    <div class="p-2">Title: <b>{{ $product->title }}</b></div>
                                    <div class="p-2">Price: {{ $product->price }}$</div>
                                    <div class="p-2">Location: {{ $product->user->location }}</div>
                                    
                            <div class="p-2">Name: <b>{{ $product->user->name }}</b></div>
                            <div class="p-2">Email: {{ $product->user->email }}$</div>
                            <div class="p-2">Kontakt {{ $product->user->phone }}$</div>
                           
                        

                                </div>
                            </div>

                            <div class="col-8">
                                <strong>Description</strong>
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</x-layout>
