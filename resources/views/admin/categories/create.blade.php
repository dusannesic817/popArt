<x-layout>
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-6">
                <div class="card bg-light">
                    <h5 class="text-center mt-3 mb-5">Please Add Your Category</h5>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.categories.store')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name</label>
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
