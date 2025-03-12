@extends('layout.layout')

@section('title', 'User Login')

@section('content')

<div class="container">
    <h2>Welcome, {{ $user->name }}</h2>

    <h3>Nearby Stores</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Distance (km)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stores as $store)
                <tr>
                    <td>{{ $store->name }}</td>
                    <td>{{ $store->address }}</td>
                    <td>{{ round($store->distance, 2) ?? 'Unknown' }} km</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection