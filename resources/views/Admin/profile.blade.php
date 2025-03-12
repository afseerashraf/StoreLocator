@extends('layout.adminLayout')
@section('title')Admin Dashboard @endsection
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg p-4 text-center">
                <div class="profile-img">
                    <img src="{{ asset('storage/uploads/admin/images/' . $admin->image) }}" alt="User Image" class="rounded-circle img-fluid shadow" style="width: 150px; height: 150px; object-fit: cover;">
                </div>
                <h2 class="mt-3 text-primary">{{ Session('admin')->name }}</h2>
                <p class="text-muted">{{ Session('admin')->email }}</p>
            </div>
            <a href="{{ route('admin.logout', encrypt(Session('admin')->id) ) }}" class="btn btn-outline-danger" style="width:479px;">Logout</a>
        </div>
    </div>
</div>
<!-- Font Awesome CDN for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMMOr/EO84mr1II2zQU/g0oJqD9d2/0zJ6NT3vq" crossorigin="anonymous">

@endsection