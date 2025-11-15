@extends('layouts.dashboard');
@section('content')
    <x-breadcrumb title="Categories" />
    @if (session()->has('success'))
        <div class="alert bg-success text-white mb-3 mt-3">{{ session('success') }}</div>
    @endif
    <a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary">{{ __('messages.add category') }}</a>
    <div class="contaniner">
        <div class="row">
            <div class="col-md-10 m-auto">
                <h3 class="text-center">{{ __('messages.categories') }}</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{ __('messages.image') }}</th>
                            <th>{{ __('messages.parent') }}</th>
                            <th>{{ __('messages.title') }}</th>
                            <th>{{ __('messages.content') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td> {{ $category->id ?? '' }}</td>
                                <td>
                                    <img src="{{ asset($category->image) }}" width="100">
                                </td>
                                <td>{{ $category->parent_id ?? '' }}</td>
                                <td>{{ $category->title ?? '' }}</td>
                                <td>{{ $category->content ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
