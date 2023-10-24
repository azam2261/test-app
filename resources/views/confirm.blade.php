@extends('app')
@section('title', 'تایید  و ورود به سیستم')
@section('css')@endsection
@section('content')
    <form action="{{ route('login-confirm') }}" method="POST">
        @csrf
        @method('POST')
        {{-- @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif --}}
        <div class="form-floating">
            <input type="text" id="code" name="code" class="form-control" >
           {{-- <input type="hidden" id="mobile" name="mobile" value="{{ $mobile }}"> --}}
            <label for="code">Confirm Code</label>
            
        </div>
        @if ($errors->has('code'))
            <span class="invalid-feedback" role="alert" style="display: block !important">
                <strong>{{ $errors->first('code') }}</strong>
            </span>
        @endif
        <a href="{{ route('login') }}">ارسال مجدد کد </a>
        <button class="w-100 btn btn-lg btn-primary mt-5" type="submit">Confirm</button>
    </form>
@endsection

