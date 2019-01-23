@extends ('layouts.default')

@section('content')
    <div class="text-center">
        <h2>Kaydol</h2>
    <form action="{{ route('register') }}" method="post">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <input placeholder="E-Mail" type="email" class="form-control auth-item" name="email">
        <input placeholder="Kullanici Adi" type="text" name="name" class="form-control auth-item">
        <input placeholder="Sifre" type="password" class="form-control auth-item" name="password">
        <input type="password" name="password_confirmation" placeholder="Sifre Onay" class="form-control auth-item">
        <button class="btn btn-success" type="submit">Kaydol</button>
    </form>
    </div>
@stop