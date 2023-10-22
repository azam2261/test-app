@extends('app')
@section('title', 'تایید  و ورود به سیستم')
@section('css')@endsection
@section('content')
    <form>
        <div class="form-floating">
            <input type="text" id="code" name="code" class="form-control" minlength="6" maxlength="6" required>
            <label for="code">Confirm Code</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary mt-5" type="submit">Confirm</button>
    </form>
@endsection
@section('js')@endsection
