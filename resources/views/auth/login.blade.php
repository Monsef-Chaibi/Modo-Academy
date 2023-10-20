@extends('layouts.app')

@section('content')
@if (session('local')=='en')
    <input type="hidden" name="" {{$dir='ltr'}}>
    <input type="hidden" name="" {{$st='start'}}>
@else
<input type="hidden" name="" {{$dir='rtl'}}>
<input type="hidden" name="" {{$st='end'}}>
@endif
<div dir="{{$dir}}" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('msg.login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-{{$st}}">{{ __('msg.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" placeholder="{{ __('msg.email') }}" style="    border: 2px solid blue; border-radius: 10px;" type="email" class=" py-2 px-4 rounded-md border-slate-400 focus:border-emerald-500 border-[1.4px] focus:outline-none @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-{{$st}}">{{ __('msg.password') }}</label>

                            <div class="col-md-6">
                                <input id="password"  placeholder="{{ __('msg.password') }}" style="border: 2px solid blue; border-radius: 10px;" type="password" class=" py-2 px-4 rounded-md border-slate-400 focus:border-emerald-500 border-[1.4px] focus:outline-none @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button style="background-color: blue;    border: 2px solid blue; border-radius: 10px;" type="submit" class=" justify-center items-center text-white rounded-md px-3 py-2">
                                    {{ __('msg.btnlog') }}
                                </button>



                            </div>
                            <p class="nav-item mt-2 " style="color: blue">

                                <a class="nav-link" href="{{ route('password.request') }}">
                                    {{ __('msg.forgot') }}
                                </a>
                            </p>
                            @if (Route::has('register'))
                                <p class="nav-item mt-1" style="color: blue">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('msg.res') }}</a>
                                </p>
                                @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
