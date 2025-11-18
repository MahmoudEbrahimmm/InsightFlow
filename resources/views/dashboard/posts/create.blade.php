@extends('layouts.dashboard')
@section('title-page', 'add post')
@section('content')
    <div class="animated fadeIn mt-2">
        <h3 class="text-center mt-2">{{ __('messages.create-posts') }}</h3>
        {{-- Unified Form --}}
        <form action="{{ route('dashboard.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- General Settings --}}
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header text-end fw-bold">
                    {{ __('messages.posts') }}
                </div>
                <div class="card-body">
                    <div class="row g-3">

                        <!-- Image -->
                        <div class="mb-3">
                            <label class="form-label">{{__('messages.image')}}</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <!-- Category -->
                        <div class="mb-3">
                            <label class="form-label">{{__('messages.categories')}}</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">{{__('messages.parent')}}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Translations --}}
            <div class="card shadow-sm border-0">
                <div class="card-header text-end fw-bold">
                    {{ __('messages.translations') }}
                </div>
                <div class="card-body">
                    {{-- Tabs --}}
                    <ul class="nav nav-tabs" id="languageTabs" role="tablist">
                        @foreach (config('app.languages') as $key => $lang)
                            <li class="nav-item">
                                <a class="nav-link @if ($loop->first) active @endif"
                                    id="tab-{{ $key }}" data-bs-toggle="tab" href="#lang-{{ $key }}"
                                    role="tab" aria-controls="lang-{{ $key }}"
                                    aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                    {{ strtoupper($lang) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    {{-- Tab Content --}}
                    <div class="tab-content mt-3" id="languageTabsContent">
                        @foreach (config('app.languages') as $key => $lang)
                            <div class="tab-pane fade @if ($loop->first) show active @endif"
                                id="lang-{{ $key }}" role="tabpanel" aria-labelledby="tab-{{ $key }}">

                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.title') }}
                                        ({{ $lang }})
                                    </label>
                                    <input type="text" name="{{ $key }}[title]" class="form-control"
                                        placeholder="{{ __('messages.title') }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.small description') }}
                                        ({{ $lang }})</label>
                                    <textarea name="{{ $key }}[smallDescription]" class="form-control" rows="2"></textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('messages.content') }}
                                        ({{ $lang }})</label>
                                    <textarea name="{{ $key }}[content]" class="form-control" rows="5" required></textarea>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Submit Buttons --}}
            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary btn-sm me-2">
                    <i class="fa fa-dot-circle-o"></i> {{ __('messages.submit') }}
                </button>
                <a href="{{ route('dashboard.posts.index') }}" class="btn btn-sm">
                    <i class="fa fa-ban"></i> {{ __('messages.cancel') }}
                </a>
            </div>

        </form>
    </div>

@endsection
