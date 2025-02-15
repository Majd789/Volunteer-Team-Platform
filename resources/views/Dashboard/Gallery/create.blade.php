@extends('layouts.dashboard')

@section('breadcrumbs')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('gallery.index')}}">Gallery</a></li>
    <li class="breadcrumb-item active">Upload Images</li>
@endsection

@section('content')
    <div class="container">
        <h1 class="mb-4">Upload New Images</h1>

        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- اختيار النشاط -->
            <div class="mb-3">
                <label for="activity_id" class="form-label">Select Activity</label>
                <select class="form-control" id="activity_id" name="activity_id" required>
                    <option value="">Choose an activity...</option>
                    @foreach($activities as $activity)
                        <option value="{{ $activity->id }}">{{ $activity->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- رفع الصور -->
            <div class="mb-3">
                <label for="media_url" class="form-label">Upload Images</label>
                <input type="file" class="form-control" id="media_url" name="media_url[]" accept="image/*" multiple required>
            </div>

            <!-- زر الإرسال -->
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
@endsection
