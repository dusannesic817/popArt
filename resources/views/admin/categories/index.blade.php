
@php
    $headers = ['#', 'Category', 'Action'];
@endphp

<x-layout>
    <div class="container">
        <div class="row mb-3 mt-5 border-bottom">
            <div class="col-12 mb-3">
                <div class="d-flex flex-row mb-3">
                <div class="p-2"><a href="{{route('admin.categories.create')}}" class="text-decoration-none">Add Category</a></div>
                <div class="p-2"><a href="{{route('admin.categories.subcategory')}}" class="text-decoration-none">Add Subcategory</a></div>
                </div>
            </div>
        </div>
        <x-table :headers="$headers">
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                         
                    <td>
                        <div class="d-flex flex-row mb-3">
                            <div class="p-2"><a href="{{ route('admin.categories.edit', $category) }}">Edit</a></div>
                            <div class="p-2">
                                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}">
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
        {{ $categories->links() }}

    </div>

</x-layout>


