@extends('layouts.dashboard')
@section('title-page', 'Show Details Categories Data');
@section('content')
    <x-breadcrumb title="{{ $item->title }}" />
    <div class="container">
        <div class="row">
            <div class="col-md-11 m-auto text-center">
                <table class="table text-center">
                    <thead>
                        <th>{{ __('messages.image') }}</th>
                        <th>ID</th>
                        <th>{{ __('messages.parent') }}</th>
                        <th>{{ __('messages.title') }}</th>
                        <th>{{ __('messages.content') }}</th>
                        <th>{{ __('messages.action') }}</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img src="{{ asset($item->image) }}" width="100">
                            </td>
                            <td> {{ $item->id ?? '' }}</td>
                            <td>{{ $item->parent?->title ?? '—' }}</td>
                            <td>{{ $item->title ?? '' }}</td>
                            <td>{{ $item->content ?? '' }}</td>
                            <td>
                                <a href="{{ route('dashboard.categories.index') }}"
                                    class="btn btn-primary"><i class="fa fa-home"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
