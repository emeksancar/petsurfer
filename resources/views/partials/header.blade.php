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
    </div>
</nav>