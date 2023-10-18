@extends('layouts.app')

@section('content')
@if (session('local')=='en')
<input type="hidden" name="" {{$dir='ltr'}}>

@else
<input type="hidden" name=""{{$dir='rtl'}}>


@endif

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

</form>
<div dir="{{$dir}}">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('msg.emailvery') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-primary" role="alert">
                            {{ __('msg.emailvery1') }}
                        </div>
                    @endif

                    {{ __('msg.emailvery2') }}<br><br>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('msg.emailvery3') }}</button>.
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
