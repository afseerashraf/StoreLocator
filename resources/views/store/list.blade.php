@extends('Layout.adminLayout')
@section('title', 'list stores')

@section('content')


<table class="table table-striped">
    <thead class="table-light">
        <tr>
            <th>NO</th>
            <th>Store Name</th>
            <th>Store Address</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stores as $store)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $store->name }}</td>
            <td>{{ $store->address }}</td>
            <td>{{ $store->latitude }}</td>
            <td>{{ $store->longitude }}</td>

            <td>

            <a href="{{ route('store.show', encrypt($store->id)) }}" class="btn btn-outline-success"> 👀 View Store</a>
                <form action="{{ route('store.destroy', encrypt($store->id)) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this store?')">🗑️ Delete</button>
                </form>
                <a href="{{ route('store.edit', encrypt($store->id)) }}" class="btn btn-outline-warning">✏️ Update</a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $stores->links() }}


@endsection