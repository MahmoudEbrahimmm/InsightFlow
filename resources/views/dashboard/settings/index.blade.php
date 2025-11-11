@extends('layouts.dashboard')

@section('content')
    <div class="container mt-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mt-2 mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert bg-success text-white mb-3 mt-3">{{ session('success') }}</div>
        @endif

        <div class="container-fluid">
            {{-- Breadcrumb --}}
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{ __('messages.item') }}</li>
                <li class="breadcrumb-item"><a href="#">{{ __('messages.admin') }}</a></li>
                <li class="breadcrumb-item active">{{ __('messages.dashboard') }}</li>
                <li class="breadcrumb-menu ms-auto">
                    <div class="btn-group" role="group">
                        <a href="#" class="btn btn-secondary"><i class="icon-speech"></i></a>
                        <a href="{{ route('dashboard.index') }}" class="btn btn-secondary"><i class="icon-graph"></i>
                            {{ __('messages.dashboard') }}</a>
                        <a href="{{ route('settings') }}" class="btn btn-secondary"><i class="icon-settings"></i>
                            {{ __('messages.settings') }}</a>
                    </div>
                </li>
            </ol>

            <div class="animated fadeIn">

                {{-- Unified Form --}}
                <form action="{{ route('settings.update', $setting) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- General Settings --}}
                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-header bg-primary text-white fw-bold">
                            {{ __('messages.settings') }}
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('') }}</label>
                                    <img src="{{ asset($setting->logo) }}" width="100">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">{{ __('') }}</label>
                                    <img src="{{ asset( $setting->favicon) }}" width="100">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">{{ __('messages.logo') }}</label>
                                    <input type="file" name="logo" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">{{ __('messages.favicon') }}</label>
                                    <input type="file" name="favicon" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">{{ __('messages.facebook') }}</label>
                                    <input type="text" name="facebook" class="form-control"
                                        placeholder="https://facebook-url" value="{{ $setting->facebook }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">{{ __('messages.instgram') }}</label>
                                    <input type="text" name="instgram" class="form-control"
                                        placeholder="https://instgram-url" value="{{ $setting->instgram }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">{{ __('messages.phone') }}</label>
                                    <input type="text" name="phone" class="form-control" placeholder="+201234567890"
                                        value="{{ $setting->phone }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">{{ __('messages.email') }}</label>
                                    <input type="text" name="email" class="form-control"
                                        placeholder="website@gmail.com" value="{{ $setting->email }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Translations --}}
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-info text-white fw-bold">
                            {{ __('messages.translations') }}
                        </div>
                        <div class="card-body">
                            {{-- Tabs --}}
                            <ul class="nav nav-tabs" id="languageTabs" role="tablist">
                                @foreach (config('app.languages') as $key => $lang)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($loop->first) active @endif"
                                            id="tab-{{ $key }}" data-bs-toggle="tab"
                                            href="#lang-{{ $key }}" role="tab"
                                            aria-controls="lang-{{ $key }}"
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
                                        id="lang-{{ $key }}" role="tabpanel"
                                        aria-labelledby="tab-{{ $key }}">

                                        <div class="form-group mb-3">
                                            <label class="form-label">{{ __('messages.title') }}
                                                ({{ $lang }})</label>
                                            <input type="text" name="{{ $key }}[title]" class="form-control"
                                                placeholder="{{ __('messages.title') }}"
                                                value="{{ $setting->translate($key)->title }}">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="form-label">{{ __('messages.content') }}
                                                ({{ $lang }})</label>
                                            <textarea name="{{ $key }}[content]" class="form-control" rows="5">{{ $setting->translate($key)->content }}</textarea>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="form-label">{{ __('messages.address') }}
                                                ({{ $lang }})</label>
                                            <input type="text" name="{{ $key }}[address]" class="form-control" value="{{ $setting->translate($key)->address }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Submit Buttons (bottom-right) --}}
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary btn-sm me-2">
                            <i class="fa fa-dot-circle-o"></i> {{ __('messages.submit') }}
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> {{ __('messages.reset') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>

    {{-- JS: Activate Bootstrap Tabs --}}
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const triggerTabList = [].slice.call(document.querySelectorAll('#languageTabs a'));
                triggerTabList.forEach(function(triggerEl) {
                    const tabTrigger = new bootstrap.Tab(triggerEl);
                    triggerEl.addEventListener('click', function(event) {
                        event.preventDefault();
                        tabTrigger.show();
                    });
                });
            });
        </script>
    @endpush
@endsection
