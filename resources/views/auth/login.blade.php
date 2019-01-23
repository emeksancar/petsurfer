@extends ('layouts.default')

@section('content')
    <div class="text-center">
        <h2>Giris Yap</h2>
        <form action="{{ route('login') }}" method="post">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input placeholder="E-Mail" type="email" class="form-control auth-item" name="email">
            <input placeholder="Sifre" type="password" class="form-control auth-item" name="password">
            <button class="btn btn-success" type="submit">Kaydol</button>
        </form>
    </div>
@stop