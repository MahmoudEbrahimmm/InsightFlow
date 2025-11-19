@extends('layouts.dashboard')
@section('content')
    <x-breadcrumb title="Dashboard" />

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">{{ __('messages.all-users') }} {{ \App\Models\User::count() ?? '' }} </div>
                <div class="card-footer"><a href="{{ route('dashboard.users.index') }}"
                        class="nav-link">{{ __('messages.show-table') }}</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">{{ __('messages.all-categories') }} {{ \App\Models\Category::count() ?? '' }} </div>
                <div class="card-footer"><a href="{{ route('dashboard.categories.index') }}"
                        class="nav-link">{{ __('messages.show-table') }}</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">{{ __('messages.all-posts') }} {{ \App\Models\Post::count() ?? '' }} </div>
                <div class="card-footer"><a href="{{ route('dashboard.posts.index') }}"
                        class="nav-link">{{ __('messages.show-table') }}</a>
                </div>
            </div>
        </div>

    </div>
    <div class="row">

        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    {{ __('messages.categories') }}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>{{ __('messages.title') }}</th>
                                    <th>{{ __('messages.action') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->title }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.categories.show', $category->id) }}"
                                                class="btn btn-primary btn-sm px-2">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a href="{{ route('dashboard.categories.edit', $category->id) }}"
                                                class="btn btn-success btn-sm px-2">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <form action="{{ route('dashboard.categories.destroy', $category->id) }}"
                                                method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm px-2"
                                                    onclick="return confirm('{{ __('messages.con-delete') }}')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-solid fa-image"></i>
                    {{ __('messages.posts') }}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>{{ __('messages.title') }}</th>
                                    <th>{{ __('messages.auther') }}</th>
                                    <th>{{ __('messages.action') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->user ? $post->user->name : 'writer' }}</td>
                                        <td>
                                            @can('view', $post)
                                                <a href="{{ route('dashboard.posts.show', $post->id) }}"
                                                    class="btn btn-primary btn-sm px-2">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            @endcan
                                            @can('update', $post)
                                                <a href="{{ route('dashboard.posts.edit', $post->id) }}"
                                                    class="btn btn-success btn-sm px-2">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                            @endcan

                                            @can('delete', $post)
                                                <form action="{{ route('dashboard.posts.destroy', $post->id) }}" method="POST"
                                                    style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm px-2"
                                                        onclick="return confirm('{{ __('messages.con-delete') }}')">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                @endcan
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
