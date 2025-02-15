@extends('layouts.dashboard')

@section('breadcrumbs')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Users</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></li>
@endsection

@section('content')
    <div class="container">
        <h3>User Information</h3>

        <!-- User Info Table -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->status}}</td>
            </tr>
            </tbody>
        </table>

        <!-- Button to show the edit form -->
        <button class="btn btn-primary" onclick="toggleEditForm()">Edit User</button>

        <!-- Edit User Form (Hidden by default) -->
        <div id="editForm" style="display: none; margin-top: 20px;">
            <h4>Edit User Information</h4>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                <div class="form-group">
                    <label for="role">Role:</label>
                    <select id="role" name="role" class="form-control">
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="volunteer" {{ $user->role == 'volunteer' ? 'selected' : '' }}>Volunteer</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select id="status" name="status" class="form-control">
                        <option value="active" {{ $user->status=='active'? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $user->status=='inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Save Changes</button>
                <button type="button" class="btn btn-secondary" onclick="toggleEditForm()">Cancel</button>
            </form>
        </div>
    </div>

    <!-- JavaScript to toggle edit form -->
    <script>
        function toggleEditForm() {
            let form = document.getElementById("editForm");
            form.style.display = (form.style.display === "none") ? "block" : "none";
        }
    </script>
@endsection
