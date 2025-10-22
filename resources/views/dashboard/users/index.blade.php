@extends('layouts.dashboard')
@section('title-page','المستخدمين')
@section('content')
<x-breadcrumb title="المستخدمين" />
<a href="{{route('dashboard.users.create')}}" class="btn btn-primary">اضافة موظف جديد</a>
<div class="container">
    <div class="row">
        @if (session()->has('success'))
                <div class="alert bg-success text-white mb-3 mt-3">{{session('success')}}</div>
            @endif
        <div class="col-md-10 m-auto text-center">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Roles</th>
                    <th>Created_at</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                                @if ($user->role == 'admin')
                                    <span class="badge bg-primary">Admin</span>
                                @else
                                    <span class="badge bg-secondary">User</span>
                                @endif
                            </td>
                        <td>{{ $user->created_at->format('d-m-y') }}</td>
                        <td>
                            <a href="{{ route('dashboard.users.show', $user->id) }}" class="btn btn-primary px-2"><i
                                            class="fa-solid fa-eye"></i></a>

                                    <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-success px-2"><i
                                            class="fa-solid fa-pen-to-square"></i></a>

                                    <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="post"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger px-2"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    {{ $users->links() }}
@endsection