@extends('layouts.dashboard')

@section('breadcrumbs')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('users.index')}}">users</a></li>
@endsection

@section('content')
    <div class="container">
        <h1>Users</h1>

        <!-- Filter -->
        <div class="mb-3">
            <form action="{{ route('users.index') }}" method="GET">
                <label for="status">Filter by Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="">All</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                <button type="submit" class="btn btn-primary mt-2">Filter</button>
            </form>
        </div>

        <!-- Classrooms List -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($Users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->status}}</td>
                    <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-info">View User</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
{{--        <div class="d-flex justify-content-center">--}}
{{--            {{ $Users->appends(request()->input())->links('pagination::bootstrap-4') }}--}}
{{--        </div>--}}

{{--    </div>--}}
@endsection
