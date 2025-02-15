@extends('layouts.dashboard')

@section('breadcrumbs')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('activities.index') }}">Activities</a></li>
    <li class="breadcrumb-item active">Edit Activity</li>
@endsection

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Activity</h1>

        <!-- فورم التعديل -->
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('activities.update', $activity->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- عنوان النشاط -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $activity->title) }}" required>
                    </div>

                    <!-- الوصف -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description', $activity->description) }}</textarea>
                    </div>

                    <!-- تاريخ البداية -->
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date', $activity->start_date) }}" required>
                    </div>

                    <!-- تاريخ النهاية -->
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" value="{{ old('end_date', $activity->end_date) }}" required>
                    </div>

                    <!-- الموقع -->
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" id="location" name="location" class="form-control" value="{{ old('location', $activity->location) }}" required>
                    </div>

                    <!-- الصورة -->
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" id="photo" name="photo" class="form-control">
                        @if ($activity->photo)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $activity->photo) }}" class="img-thumbnail" style="height: 150px;" alt="Activity Image">
                            </div>
                        @endif
                    </div>

                    <!-- زر التحديث -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Update Activity</button>
                        <a href="{{ route('activities.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
