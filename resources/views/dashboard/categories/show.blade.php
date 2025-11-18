@extends('layouts.dashboard')
@section('title-page', 'Show Details Categories Data')
@section('content')
    <x-breadcrumb title="{{ $item->title }}" />

    <div class="container mt-4">
        <div class="card shadow-sm border-0">
            <div class="card-header text-end fw-bold">
                {{ __('messages.categories') }}
            </div>
            <div class="card-body">

                {{-- Image --}}
                <div class="text-center mb-4">
                    @if ($item->image)
                        <img src="{{ asset($item->image) }}" class="img-fluid rounded" width="200" alt="Category Image">
                    @else
                        <div class="text-muted">{{ __('messages.no image') }}</div>
                    @endif
                </div>

                {{-- Details --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>ID</strong> {{ $item->id ?? '—' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>{{ __('messages.parent') }}:</strong> {{ $item->parent?->title ?? '—' }}</p>
                    </div>
                </div>

                {{-- Translations --}}
                @foreach (config('app.languages') as $key => $lang)
                    <div class="card mb-3 border-light shadow-sm">
                        <div class="card-header fw-bold">
                            {{ __('messages.translations') }} ({{ strtoupper($lang) }})
                        </div>
                        <div class="card-body text-start">
                            <p><strong>{{ __('messages.title') }}:</strong> {{ $item->translate($key)->title ?? '—' }}</p>
                            <p><strong>{{ __('messages.content') }}:</strong> {{ $item->translate($key)->content ?? '—' }}</p>
                        </div>
                    </div>
                @endforeach

                {{-- Back Button --}}
                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('dashboard.categories.index') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> {{ __('messages.back') }}
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
