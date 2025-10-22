@extends('layouts.dashboard')
@section('title-page', 'add new user')
@section('content')
    <x-breadcrumb title="add-user" />

    <div class="card-body p-4">
        <form method="POST" action="{{ route('dashboard.users.store') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
            </div>

            <!-- Phone -->
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
            </div>

            <!-- Role -->
            <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-select">
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>


            <div class="d-grid">
                <button type="submit" class="btn btn-success btn-lg">add user</button>
            </div>
        </form>
    </div>


@endsection
