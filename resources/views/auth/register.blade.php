@extends('layouts.app')

@section('content')
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
                <div class="card-header">{{ __('msg.register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-{{$st}}">{{ __('msg.name') }}</label>

                            <div class="col-md-6">
                                <input style="border: 2px solid blue; border-radius: 10px;" id="name" type="text" class="py-2 px-4 rounded-md border-slate-400 focus:border-emerald-500 border-[1.4px] focus:outline-none @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-{{$st}}">{{ __('msg.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" style="border: 2px solid blue; border-radius: 10px;" type="email" class="py-2 px-4 rounded-md border-slate-400 focus:border-emerald-500 border-[1.4px] focus:outline-none @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('msg.erremail') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-{{$st}}">{{ __('msg.phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" style="    border: 2px solid blue; border-radius: 10px;" type="number" class="py-2 px-4 rounded-md border-slate-400 focus:border-emerald-500 border-[1.4px] focus:outline-none @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required >

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-{{$st}}">{{ __('msg.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" style="    border: 2px solid blue; border-radius: 10px;" type="password" class="py-2 px-4 rounded-md border-slate-400 focus:border-emerald-500 border-[1.4px] focus:outline-none @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('msg.errpass') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-{{$st}}">{{ __('msg.password1') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm"  style="    border: 2px solid blue; border-radius: 10px;" type="password" class="py-2 px-4 rounded-md border-slate-400 focus:border-emerald-500 border-[1.4px] focus:outline-none" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" style="background-color: blue ;    border: 2px solid blue; border-radius: 10px;" class="justify-center items-center text-white rounded-md bg-emerald-500 hover:bg-emerald-600 px-3 py-2">
                                    {{ __('msg.register') }}
                                </button>
                            </div>
                        </div>

                        @if (Route::has('login'))
                                <p  style="color: blue" class="nav-itemmt-3">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('msg.login') }}</a>
                                </p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
