@extends('Layout.adminLayout')
@section('title', 'Create Store')

@section('content')
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-location {
            background-color: #6c757d;
            color: #fff;
            border: none;
        }
        .btn-location:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h3 class="text-center mb-3">Create Store</h3>
        
        <form action="{{ route('store.update', encrypt($store->id)) }}" method="POST">
           @csrf
           @method('PUT')   
           <div class="mb-3">
                <label for="storeName" class="form-label">Store Name</label>
                <input type="text" class="form-control" name="name" value="{{ $store->name }}" required>
                @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="storeAddress" class="form-label">Store Address</label>
                <textarea name="address" class="form-control" rows="4" required>{{ $store->address }}</textarea>
                @error('address') <div class="text-danger small">{{ $message }}</div> @enderror

            </div>

            <!-- Latitude -->
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" class="form-control" name="latitude" value="{{ $store->latitude }}" required>
                @error('latitude') <div class="text-danger small">{{ $message }}</div> @enderror

            </div>

            <!-- Longitude -->
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" class="form-control" name="longitude" value="{{ $store->longitude }}" required>
                @error('longitude') <div class="text-danger small">{{ $message }}</div> @enderror

            </div>


            <button type="submit" class="btn btn-primary w-100">Update Store</button>
        </form>
    </div>
</div>


@endsection
