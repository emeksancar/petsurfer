<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">PetSurfer</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="/">Ana Sayfa</a></li>
            <li><a href="{{ route('books.list') }}">Kitaplar</a></li>
            <li><a href="{{ route('author.list') }}">Yazarlar</a></li>
            <li><a href="{{ route('category.list') }}">Kategoriler</a></li>
        </ul>
        <div class="auth-section">
            <div class="guest-section">
                @if(Auth::guest())
                    <a href="{{ url('/login') }}">Giris Yap</a>
                    <a href="{{ url('/register') }}">Kayit Ol!</a>
                @else
            </div>
                <div class="logged-in">
                    Hosgeldin <span>{{ Auth::user()->name }}</span>
                    <form action="{{ url('logout') }}" method="post">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <button class="btn btn-sm" type="submit">Cikis Yap</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</nav>