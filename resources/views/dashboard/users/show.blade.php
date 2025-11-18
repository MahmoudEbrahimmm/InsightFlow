@extends('layouts.dashboard')
@section('title-page', 'Show Details User Data')
@section('content')
    <x-breadcrumb title="{{ $item->name }}" />

    <div class="container mt-4">
        <div class="card shadow-sm border-0">
            <div class="card-header text-end fw-bold">
                {{ __('messages.users') }}
            </div>
            <div class="card-body">

                {{-- User Info --}}
                <div class="row mb-4">
                    <div class="col-md-6">
                        <p><strong>{{ __('messages.name') }}:</strong> {{ $item->name }}</p>
                        <p><strong>{{ __('messages.email') }}:</strong> {{ $item->email }}</p>
                        <p><strong>{{ __('messages.phone') }}:</strong> {{ $item->phone }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>{{ __('messages.role') }}:</strong>
                            @if ($item->role == 'admin')
                                <span class="badge bg-primary">Admin</span>
                            @else
                                <span class="badge bg-secondary">User</span>
                            @endif
                        </p>
                        <p><strong>{{ __('messages.created') }}:</strong> {{ $item->created_at->format('Y-m-d H:i') }}</p>
                        <p><strong>{{ __('messages.updated') }}:</strong> {{ $item->updated_at->format('Y-m-d H:i') }}</p>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="d-flex gap-2 justify-content-center mt-4">
                    <a href="{{ route('dashboard.users.index') }}" class="btn btn-primary px-3">
                        <i class="fa-solid fa-house"></i>
                    </a>

                    <a href="{{ route('dashboard.users.edit', $item->id) }}" class="btn btn-success px-3">
                        <i class="fa-solid fa-pen-to-square"></i> 
                    </a>

                    <form action="{{ route('dashboard.users.destroy', $item->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger px-3" onclick="return confirm('{{ __('messages.con-delete') }}')">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
