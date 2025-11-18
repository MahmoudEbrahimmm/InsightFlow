@extends('layouts.dashboard')
@section('content')

            <x-breadcrumb title="Dashboard" />
            
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">{{ __('messages.all-users') }} {{ \App\Models\User::count() ?? '' }} </div>
                        <div class="card-footer"><a href="{{route('dashboard.users.index')}}" class="nav-link">{{ __('messages.show-table') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">{{ __('messages.all-categories') }} {{ \App\Models\Category::count() ?? '' }} </div>
                        <div class="card-footer"><a href="{{route('dashboard.categories.index')}}" class="nav-link">{{ __('messages.show-table') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">{{ __('messages.all-posts') }} {{ \App\Models\Post::count() ?? '' }} </div>
                        <div class="card-footer"><a href="{{route('dashboard.posts.index')}}" class="nav-link">{{ __('messages.show-table') }}</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Area Chart Example
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Bar Chart Example
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>
            </div>


@endsection
