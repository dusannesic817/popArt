@php
    $headers = ['#', 'Title', 'Price', 'Category', 'Customer', 'Action'];
@endphp

<x-layout>
    <div class="container">
        <div class="row mb-3 mt-5 border-bottom">
            <div class="col-12 mb-3">
                <div><a href="{{route('admin.products.create')}}" class="text-underline-none">Add Product</a></div>
            </div>
        </div>

        <x-table :headers="$headers">
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->price }} $</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->user->name }}</td>
                    <td>
                        <div class="d-flex flex-row mb-3">
                            <div class="p-2"><a href="{{ route('admin.products.edit', $product) }}">Edit</a></div>
                            <div class="p-2">
                                <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table>
        {{ $products->links() }}

    </div>

</x-layout>
