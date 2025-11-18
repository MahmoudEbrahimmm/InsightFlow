@extends('layouts.dashboard')

@section('content')
    <x-breadcrumb title="Posts" />

    @if (session()->has('success'))
        <div class="alert bg-success text-white mb-3 mt-3">{{ session('success') }}</div>
    @endif

    <a href="{{ route('dashboard.posts.create') }}" class="btn btn-primary mb-3">
        {{ __('messages.add post') }}
    </a>

    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto text-center">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{ __('messages.image') }}</th>
                            <th>{{ __('messages.title') }}</th>
                            <th>{{ __('messages.action') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>
                                    <img src="{{ asset($post->image) }}" width="100" alt="post Image">
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <a href="{{ route('dashboard.posts.show', $post->id) }}"
                                        class="btn btn-primary btn-sm px-2">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <a href="{{ route('dashboard.posts.edit', $post->id) }}"
                                        class="btn btn-success btn-sm px-2">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <form action="{{ route('dashboard.posts.destroy', $post->id) }}"
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
@endsection
