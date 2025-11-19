@extends('layouts.dashboard')
@section('title-page', 'Show Post Details')
@section('content')
    <x-breadcrumb title="{{ $post->title }}" />

    <div class="container mt-4">
        <div class="card shadow-sm border-0">
            <div class="card-header text-end fw-bold">
                {{ __('messages.posts') }}
            </div>
            <div class="card-body">

                {{-- Image and Category --}}
                <div class="row mb-4">
                    <div class="col-md-4 text-center">
                        @if ($post->image)
                            <img src="{{ asset($post->image) }}" class="img-fluid rounded mb-2" alt="Post Image">
                        @else
                            <div class="text-muted">{{ __('messages.no image') }}</div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <p><strong>ID</strong> {{ $post->id }}</p>
                        <p><strong>{{ __('messages.auther') }}:</strong> {{ $post->user ? $post->user->name : 'writer' }}</p>
                        <p><strong>{{ __('messages.categories') }}:</strong> {{ $post->category?->title ?? '—' }}</p>
                        <p><strong>{{ __('messages.created') }}:</strong> {{ $post->created_at->format('Y-m-d H:i') }}</p>
                        <p><strong>{{ __('messages.updated') }}:</strong> {{ $post->updated_at->format('Y-m-d H:i') }}</p>
                    </div>
                </div>

                {{-- Translations Tabs --}}
                <ul class="nav nav-tabs" id="languageTabs" role="tablist">
                    @foreach (config('app.languages') as $key => $lang)
                        <li class="nav-item">
                            <a class="nav-link @if ($loop->first) active @endif" id="tab-{{ $key }}"
                                data-bs-toggle="tab" href="#lang-{{ $key }}" role="tab"
                                aria-controls="lang-{{ $key }}"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                {{ strtoupper($lang) }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content mt-3" id="languageTabsContent">
                    @foreach (config('app.languages') as $key => $lang)
                        <div class="tab-pane fade @if ($loop->first) show active @endif" id="lang-{{ $key }}"
                            role="tabpanel" aria-labelledby="tab-{{ $key }}">
                            
                            <div class="mb-3">
                                <h5>{{ __('messages.title') }}:</h5>
                                <p>{{ $post->translate($key)->title ?? '—' }}</p>
                            </div>

                            <div class="mb-3">
                                <h5>{{ __('messages.small description') }}:</h5>
                                <p>{{ $post->translate($key)->smallDescription ?? '—' }}</p>
                            </div>

                            <div class="mb-3">
                                <h5>{{ __('messages.content') }}:</h5>
                                <p>{!! nl2br(e($post->translate($key)->content ?? '—')) !!}</p>
                            </div>

                        </div>
                    @endforeach
                </div>

                {{-- Back Button --}}
                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('dashboard.posts.index') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> {{ __('messages.back') }}
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
