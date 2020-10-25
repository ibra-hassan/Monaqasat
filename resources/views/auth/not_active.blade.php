@extends('layouts.app_auth')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mx-4">
                <div class="card-body p-4 text-center">
                    <h1>{{ trans('panel.welcome_no_active') }}</h1>

                    @if(session('message'))
                        <div class="alert alert-info" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <p class="pt-3 font-lg">
                        {{ trans('panel.not_active') }}
                    </p>
                    <div class="row pt-lg-5 justify-content-between">
                        <a href="#" class="btn btn-ghost-primary px-4">
                            {{ trans('global.website') }}
                        </a>
                        <a href="#"
                           class="btn btn-ghost-dark px-4"
                           onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            {{ trans('global.logout') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endsection
