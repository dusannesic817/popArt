<x-layout>
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-6">
                <div class="card bg-light">
                    <h5 class="text-center mt-3 mb-5">Please Add Your Product</h5>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    aria-describedby="emailHelp">
                                @error('title')
                                    <div class="form-text">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" id="price" name="price" class="form-control">
                                @error('price')
                                    <div class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="parent" class="form-label">Select Category</label>
                                <select id="parent-category" class="form-select" aria-label="Default select example"
                                    name="parent_id" name="parent_category">
                                    <option selected>Choose</option>
                                    @foreach ($parents as $parent)
                                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="child" class="form-label">Select Subcategory</label>
                                <select id="child-category" class="form-select" aria-label="Default select example"
                                    name="category_id">
                                    <option selected>Choose subcategory</option>
                                </select>
                            </div>
                            <div class="form-check d-inline-block me-3">
                                <input class="form-check-input" type="radio" name="condition" id="radioDefault1"
                                    value="novo">
                                <label class="form-check-label" for="radioDefault1">
                                    Novo
                                </label>
                            </div>
                            <div class="form-check d-inline-block">
                                <input class="form-check-input" type="radio" name="condition" id="radioDefault2"
                                    value="polovno" checked>
                                <label class="form-check-label" for="radioDefault2">
                                    Polovno
                                </label>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Provide image</label>
                                <input class="form-control" type="file" id="formFile" name='image'
                                    accept="image/*">
                            </div>

                            <div class="mb-3" id="previewContainer" style="display: none;">
                                <img id="previewImage" src="" alt="Preview" width="200" height="120">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="6"></textarea>
                                @error('description')
                                    <div class="form-text">{{ $message }}</div>
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
<script>
    document.getElementById('parent-category').addEventListener('change', function() {
        const parentId = this.value;
        const childSelect = document.getElementById('child-category');


        if (!parentId) {
            childSelect.innerHTML = '<option selected>Choose subcategory</option>';
            return;
        }

        childSelect.innerHTML = '<option>Loading...</option>';

        fetch(`/categories/${parentId}/children`)
            .then(response => response.json())
            .then(children => {
                let options = '<option selected>Choose subcategory</option>';
                children.forEach(child => {
                    options += `<option value="${child.id}">${child.name}</option>`;
                });
                childSelect.innerHTML = options;
            })
            .catch(() => {
                childSelect.innerHTML = '<option>Error loading subcategories</option>';
            });
    });

    document.getElementById('child-category').addEventListener('change', function() {
        const childId = this.value;

    });
</script>
<script>
    const input = document.getElementById('formFile');
    const previewContainer = document.getElementById('previewContainer');
    const previewImage = document.getElementById('previewImage');

    input.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.style.display = 'block';
            }

            reader.readAsDataURL(file);
        } else {
            previewContainer.style.display = 'none';
            previewImage.src = '';
        }
    });
</script>
