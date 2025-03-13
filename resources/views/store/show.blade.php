@extends('Layout.adminLayout')
@section('title', 'store detiles')

@section('content')


<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="store-card p-4">
                <!-- Store Header -->
                <div class="store-header">
                    <div>
                        <h2 class="store-title">{{ $store->name }}</h2>
                    </div>
                </div>

                <!-- Store Details -->
                <p><strong>📍 Address:</strong> {{ $store->address }}</p>
                <p><strong>🌍 Location:</strong> <a href="https://www.google.com/maps/search/?api=1&query={{ $store->latitude }},{{ $store->longitude }}" target="_blank" style="text-decoration: none;">View on Map</a></p>

                <!-- Back Button -->
                <a href="{{ route('store.index') }}" class="btn-back" style="text-decoration: none;">⬅️ Back to Stores</a>
            </div>
        </div>
    </div>

@endsection