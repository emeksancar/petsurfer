@extends ('layouts.default')

@section('content')
    @include('partials.messages')
<form action="{{ route('author.list') }}" method="get">
    <input placeholder="Yazar adi, soyadi ya da ulkesi" class="form-control form-item" type="text" name="keyword" value="{{ app('request')->input('keyword') }}">
    <button type="submit" class="btn btn-success">Ara</button>
</form>

<div class="upper-list">
    <h2>Yazarlar</h2>
    <a class="btn btn-success add-button" href="{{ route('author.create') }}">Yeni Yazar Ekle</a>
</div>

<table>
    <tr>
        <th>Id</th>
        <th>Adi</th>
        <th>Soyadi</th>
        <th>Ulkesi</th>
        <th>Islemler</th>
    </tr>
    @foreach($authors as $author)
        <tr>
            <td>{{ $author->id }}</td>
            <td>{{ $author->first_name }}</td>
            <td>{{ $author->last_name }}</td>
            <td>{{ $author->country }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('author.edit', $author->id) }}">Duzenle</a>
                <a class="btn btn-danger" href="{{ route('author.delete', $author->id) }}">Sil</a>
            </td>
        </tr>
    @endforeach
</table>
@stop
