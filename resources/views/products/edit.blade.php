<x-layout>

    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-6">
                <div class="card bg-light">
                    <h5 class="text-center mt-3 mb-5">Please Add Your Product</h5>
                    <div class="card-body">
                       <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    aria-describedby="emailHelp" value="{{ $product->title }}">
                                @error('title')
                                    <div class="form-text">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" id="price" name="price" class="form-control"
                                    value="{{ $product->price }}">
                                @error('price')
                                    <div class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="parent" class="form-label">Select Category</label>
                                <select id="parent-category" class="form-select" aria-label="Default select example"
                                    name="parent_id">
                                    @foreach ($parents as $parent)
                                        <option value="{{ $parent->id }}"
                                            {{ old('parent_id', $product->parent_id) == $parent->id ? 'selected' : '' }}>
                                            {{ $parent->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="mb-3">
                                <label for="child" class="form-label">Select Subcategory</label>
                                <select id="child-category" class="form-select" aria-label="Default select example"
                                    name="category_id">
                                    @if ($product->category)
                                        <option value="{{ $product->category->id }}" selected>
                                            {{ $product->category->name }}</option>
                                    @else
                                        <option selected>Choose subcategory</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-check d-inline-block me-3">
                                <input class="form-check-input" type="radio" name="condition" id="radioDefault1"
                                    value="novo"
                                    {{ old('condition', $product->condition) == 'novo' ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioDefault1">
                                    Novo
                                </label>
                            </div>

                            <div class="form-check d-inline-block">
                                <input class="form-check-input" type="radio" name="condition" id="radioDefault2"
                                    value="polovno"
                                    {{ old('condition', $product->condition) == 'polovno' ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioDefault2">
                                    Polovno
                                </label>
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Provide image</label>
                                <input class="form-control" type="file" id="formFile" name='image'
                                    accept="image/*">
                            </div>

                            <div class="mb-3" id="previewContainer"
                                style="{{ $product->image ? '' : 'display: none;' }}">
                                <img id="previewImage"
                                    src="{{ $product->image ? asset('storage/' . $product->image) : '' }}"
                                    alt="Preview" width="200" height="120">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="6">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary w-100">Post Your Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
