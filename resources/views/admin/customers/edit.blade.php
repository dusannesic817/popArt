<x-layout>

    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-6">
                <div class="card bg-light">
                    <h5 class="text-center mt-3 mb-5">Please Add Customer</h5>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.customers.update',$customer)}}">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    aria-describedby="emailHelp" value="{{ old('name', $customer->name) }}">
                                @error('name')
                                    <div class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    aria-describedby="emailHelp" value="{{ old('email', $customer->email) }}">
                                @error('email')
                                    <div class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name='password'
                                    value="{{ $customer->password }}">
                                @error('password')
                                    <div class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm Pasword</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name='password_confirmation' value="{{ $customer->password }}">
                                @error('password')
                                    <div class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location"
                                    aria-describedby="emailHelp" value="{{ old('location', $customer->location) }}">
                                @error('location')
                                    <div class="form-text">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    aria-describedby="emailHelp" value="{{ old('phone', $customer->phone) }}">
                                @error('phone')
                                    <div class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                Admin Previliges
                                <div class="form-check d-inline-block me-3">
                                    <input class="form-check-input" type="radio" name="is_admin" id="radioDefault1"
                                        value="1" {{ old('is_admin', $customer->is_admin) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="radioDefault1">
                                        Yes
                                    </label>
                                </div>

                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="radio" name="is_admin" id="radioDefault2"
                                        value="0" {{ old('is_admin', $customer->is_admin) == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="radioDefault2">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div class="mt-5">
                                <button type="submit" class="btn btn-primary w-100">Add Customer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
