@extends('layouts.dashboard')
@section('breadcrumbs')
    @parent

    <li class="breadcrumb-item active"><a href="{{route('activities.index')}}">Activities</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('activities.show', $activity->id) }}">{{ $activity->title }}</a></li>

@endsection
@section('content')
    <div class="container">
        <h1 class="mb-4">Activity Details</h1>

        <div class="card shadow-sm">
            @if ($activity->photo)
                <img src="{{ asset('storage/' . $activity->photo) }}" class="card-img-top img-fluid" style="height: 300px; object-fit: cover;" alt="{{ $activity->title }}">
            @else
                <img src="{{ asset('images/default.jpg') }}" class="card-img-top img-fluid" style="height: 300px; object-fit: cover;" alt="Default Image">
            @endif
            <div class="card-body">
                <h3 class="card-title">{{ $activity->title }}</h3>
                <p class="card-text">{{ $activity->description }}</p>
                <p class="small">
                    <strong>Start Date:</strong> {{ $activity->start_date }} <br>
                    <strong>End Date:</strong> {{ $activity->end_date }} <br>
                    <strong>Location:</strong> {{ $activity->location }} <br>
                    <strong>Status:</strong>
                    @if ($activity->end_date >= now())
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </p>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('activities.index') }}" class="btn btn-secondary">Back</a>
                    <a href="{{ route('activities.edit', $activity->id) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
