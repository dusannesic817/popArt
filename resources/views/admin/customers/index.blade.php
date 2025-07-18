@php
    $headers = ['#', 'Name', 'Email', 'Location', 'Phone', 'Action'];
@endphp


<x-layout>
 <div class="container">
        <div class="row mb-3 mt-5 border-bottom">
            <div class="col-12 mb-3">
                <div><a href="{{route('admin.customers.create')}}" class="text-underline-none">Add Customer</a></div>
            </div>
        </div>

        <x-table :headers="$headers">
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->location }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>
                        <div class="d-flex flex-row mb-3">
                            <div class="p-2"><a href="{{ route('admin.customers.edit', $customer) }}">Edit</a></div>
                            <div class="p-2">
                                <form method="POST" action="{{ route('admin.customers.destroy', $customer) }}">
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
        {{ $customers->links() }}


</x-layout>