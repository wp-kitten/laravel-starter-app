{{--
    This is where the users are redirected after login.
    The name should not change.
--}}
@extends('layouts.frontend')
<?php

$user = app_user();

?>

@section('footer-scripts')

@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Home') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @auth
                            {{ __('You are logged in :name (role: :role).', ['name' => $user->name, 'role' => $user->role->name]) }}

                            <div class="mt-4">
                                <a class="nav-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        @endauth

                        @guest
                            <a href="{{route('login')}}">Login</a>
                        @endguest

                        <div id="root"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
