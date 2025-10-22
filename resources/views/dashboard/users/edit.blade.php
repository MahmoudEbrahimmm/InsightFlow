@extends('layouts.dashboard')

@section('title-page', 'Edit data user')

@section('content')
<x-breadcrumb title="Edit Data : {{ $user->name }}" />

<div class="card-body p-4">
    <form method="POST" action="{{ route('dashboard.users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
        </div>

        <!-- Phone -->
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control">
        </div>

        <!-- Role -->
        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" class="form-select">
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="d-flex">
            <button type="submit" class="btn btn-success w-25 me-3"> Update Data</button>
            <a href="{{route('dashboard.users.index')}}" class="btn btn-secondary w-25">Cancle</a>
        </div>
    </form>
</div>
@endsection
