@extends('layout.layout')

@section('title', 'home')

@section('content')

<style>
    body {
        background: linear-gradient(to right, #6a11cb, #2575fc);
        color: white;
        font-family: 'Poppins', sans-serif;
    }

    .container {
        max-width: 800px;
        background: white;
        color: black;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        margin-top: 50px;
    }

    h2, h3 {
        text-align: center;
        font-weight: bold;
    }

    /* Table Styling */
    .table {
        margin-top: 20px;
        border-radius: 10px;
        overflow: hidden;
    }

    .table th {
        background: #2575fc;
        color: white;
        text-align: center;
    }

    .table tbody tr {
        transition: transform 0.3s ease-in-out;
    }

    .table tbody tr:hover {
        transform: scale(1.05);
        background: #f4f4f4;
    }

    .location-icon {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        font-size: 30px;
        animation: bounce 1s infinite;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

  

</style>

<div class="container">
    <h2>Welcome, {{ $user->name }} 👋</h2>

    <div class="location-icon">📍 Detecting Your Location...</div>
    <a href="{{ route('user.logout') }}" class="btn btn-outline-danger">Logout</a>


    <h3>Nearby Stores 🏪</h3>
    <table class="table table-bordered text-center">
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



<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap"></script>

@endsection
