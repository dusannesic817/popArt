<x-layout>
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-6">
                <div class="card bg-light">
                    <h5 class="text-center mt-3 mb-5">Please Add Your Category</h5>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.categories.storeSubcategory') }}">
                            @csrf
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
                                <label for="name" class="form-label">Subcategory Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                                    @error('name')
                                     <div id="name" class="form-text">{{$message}}</div>
                                    @enderror                               
                            </div>                        
                           <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
