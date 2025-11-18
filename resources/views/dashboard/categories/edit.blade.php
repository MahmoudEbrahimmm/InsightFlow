@extends('layouts.dashboard')
@section('title-page', 'Edit Category')
@section('content')
<div class="animated fadeIn mt-2">
    <h3 class="text-center mt-2">{{ __('messages.categories') }}</h3>

    <form action="{{ route('dashboard.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- General --}}
        <div class="card mb-4 shadow-sm border-0">
            <div class="card-header text-end fw-bold">
                {{ __('messages.categories') }}
            </div>

            <div class="card-body">
                <div class="row g-3">

                    {{-- Current Image --}}
                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.image') }}</label>
                        <input type="file" name="image" class="form-control">
                        @if($category->image)
                            <img src="{{ asset($category->image) }}" width="90" class="mt-2" style="border-radius:6px;">
                        @endif
                    </div>

                    {{-- Parent category --}}
                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.categories') }}</label>
                        <select name="parent_id" class="form-select">
                            <option value="0">{{ __('messages.parent') }}</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->title }}
                                </option>
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
                               id="tab-{{ $key }}"
                               data-bs-toggle="tab"
                               href="#lang-{{ $key }}"
                               role="tab">
                                {{ strtoupper($lang) }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                {{-- Tab Contents --}}
                <div class="tab-content mt-3" id="languageTabsContent">

                    @foreach (config('app.languages') as $key => $lang)

                        @php
                            $translation = $category->translate($key);
                        @endphp

                        <div class="tab-pane fade @if ($loop->first) show active @endif"
                             id="lang-{{ $key }}"
                             role="tabpanel">

                            {{-- Title --}}
                            <div class="form-group mb-3">
                                <label class="form-label">{{ __('messages.title') }} ({{ $lang }})</label>
                                <input type="text" name="{{ $key }}[title]" class="form-control"
                                       value="{{ $translation->title ?? '' }}">
                            </div>

                            {{-- Content --}}
                            <div class="form-group mb-3">
                                <label class="form-label">{{ __('messages.content') }} ({{ $lang }})</label>
                                <textarea name="{{ $key }}[content]" class="form-control" rows="5">{{ $translation->content ?? '' }}</textarea>
                            </div>

                        </div>

                    @endforeach

                </div>

            </div>
        </div>

        {{-- Submit --}}
        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary btn-sm me-2">
                <i class="fa fa-dot-circle-o"></i> {{ __('messages.submit') }}
            </button>

            <a href="{{ route('dashboard.categories.index') }}" class="btn btn-sm">
                <i class="fa fa-ban"></i> {{ __('messages.cancel') }}
            </a>
        </div>

    </form>
</div>
@endsection
