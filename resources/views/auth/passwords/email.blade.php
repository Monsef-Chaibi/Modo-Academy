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
                <div class="card-header">{{ __('msg.resetpass') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-{{$st}}">{{ __('msg.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" placeholder="{{ __('msg.email') }}"  style="border: 2px solid blue; border-radius: 10px;"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4 ">
                                <button type="submit" class=" btn btn-primary">
                                    {{ __('msg.btnreset') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
