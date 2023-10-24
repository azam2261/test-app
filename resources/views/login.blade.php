@extends('app')
@section('title', 'ورود یا ثبت نام')
@section('css')
<style>
    .invalid-feedback {
        display: block !important;
    }
</style>

@endsection
@section('content')
    <form action="{{ route('confirmed-otp') }}" method="POST" role="form">
        @csrf
        <div class="form-floating">
            <input type="text" id="mobile" name="mobile" class="form-control" >
            <label for="mobile">Mobile</label>
        </div>
        @if ($errors->has('mobile'))
            <span class="invalid-feedback" role="alert" style="display: block !important">
                <strong>{{ $errors->first('mobile') }}</strong>
            </span>
        @endif
        <button class="w-100 btn btn-lg btn-primary mt-5" type="submit">Login Or Register</button>
    </form>
@endsection
