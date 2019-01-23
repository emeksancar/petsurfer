@extends ('layouts.default')

@section('content')
    @include('partials.messages')
    <form action="{{ route('books.list') }}" method="get">
        <input placeholder="Kitap Adi" class="form-control form-item" type="text" name="keyword" value="{{ app('request')->input('keyword') }}">
        <select class="form-control form-item" name="category" id="">
            <option value="">Kategori</option>
            @foreach($cats as $cat)
                @if($cat->id == app('request')->input('category'))
                    <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
                @else
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endif
            @endforeach
        </select>
        <select class="form-control form-item" name="author" id="">
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

    <div class="upper-list">
        <h2>Kitaplar</h2>
        <a class="btn btn-success add-button" href="{{ route('book.create') }}">Yeni Kitap Ekle</a>
    </div>

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
                    <a class="btn btn-info" href="{{ route('book.edit', $book->id) }}">Duzenle</a>
                    <a class="btn btn-danger" href="{{ route('book.delete', $book->id) }}">Sil</a>
                </td>
            </tr>
        @endforeach
    </table>
@stop
