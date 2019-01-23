<form action="{{ route('books.list') }}" method="get">
    <input type="text" name="keyword" value="{{ app('request')->input('keyword') }}">
    <select name="category" id="">
            <option value="">Kategori</option>
        @foreach($cats as $cat)
            @if($cat->id == app('request')->input('category'))
                <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
            @else
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endif
        @endforeach
    </select>
    <select name="author" id="">
            <option value="">Yazar...</option>
        @foreach($authors as $author)
            @if($author->id == app('request')->input('author'))
                <option value="{{ $author->id }}" selected>{{ $author->first_name }} {{ $author->last_name }}</option>
            @else
                <option value="{{ $author->id }}">{{ $author->first_name }} {{ $author->last_name }}</option>
            @endif
        @endforeach
    </select>
    <button type="submit" class="btn btn-success">Ara</button>
</form>

<a href="{{ route('book.create') }}">Yeni Kitap Ekle</a>

<h2>Kitaplar</h2>

<table>
    <tr>
        <th>Id</th>
        <th>Adi</th>
        <th>Yazar</th>
        <th>Kategori</th>
        <th>Isbn</th>
        <th>Islemler</th>
    </tr>
    @foreach($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->name }}</td>
            <td>{{ $book->author_first_name }} {{ $book->author_last_name }}</td>
            <td>{{ $book->category_name }}</td>
            <td>{{ $book->isbn }}</td>
            <td>
                <a href="{{ route('book.edit', $book->id) }}">Duzenle</a>
                <a href="{{ route('book.delete', $book->id) }}">Sil</a>
            </td>
        </tr>
    @endforeach
</table>

</body>

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
