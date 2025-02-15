@extends('layouts.dashboard')

@section('breadcrumbs')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('activities.index')}}">Activities</a></li>
@endsection

@section('content')
    <div class="container">
        <h1 class="mb-4">Activities</h1>

        <!-- زر إضافة نشاط جديد -->
        <div class="mb-3 text-end">
            <a href="{{ route('activities.create') }}" class="btn btn-success">+ Add Activity</a>
        </div>

        <!-- شبكة الأنشطة -->
        <div class="row">
            @if($activities->isEmpty())
                <p class="text-center text-muted">Not Found Activities </p>
            @else
            @foreach ($activities as $activity)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100 d-flex flex-column">
                        @if ($activity->photo)
                            <img src="{{ asset('storage/' . $activity->photo) }}"
                                 class="card-img-top img-fluid"
                                 style="height: 200px; object-fit: cover;"
                                 alt="{{ $activity->title }}">
                        @else
                            <img src="{{ asset('images/default.jpg') }}"
                                 class="card-img-top img-fluid"
                                 style="height: 200px; object-fit: cover;"
                                 alt="Default Image">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $activity->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($activity->description, 80) }}</p>
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

                            <!-- أزرار التحكم في الأسفل دائمًا -->
                            <div class="d-flex justify-content-between mt-auto">
                                <a href="{{ route('activities.show', $activity->id) }}" class="btn btn-primary btn-sm">View</a>
{{--                                <a href="{{ route('activities.edit', $activity->id) }}" class="btn btn-warning btn-sm">Edit</a>--}}
                                <form action="{{ route('activities.destroy', $activity->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
        </div>
        <!-- روابط الصفحات -->
        {{--        <div class="d-flex justify-content-center">--}}
        {{--            {{ $activities->appends(request()->input())->links() }}--}}
        {{--        </div>--}}

    </div>
@endsection
