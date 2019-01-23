@extends ('layouts.default')

@section('content')
    @include('partials.messages')
<form action="{{ route('category.list') }}" method="get">
    <input placeholder="Kategori adi ya da aciklamasi" class="form-item form-control" type="text" name="keyword" value="{{ app('request')->input('keyword') }}">
    <button type="submit" class="btn btn-success">Ara</button>
</form>

<div class="upper-list">
    <h2>Kategoriler</h2>
    <a class="btn btn-success add-button" href="{{ route('category.create') }}">Yeni Kategori Ekle</a>
</div>

<table>
    <tr>
        <th>Id</th>
        <th>Adi</th>
        <th>Soyadi</th>
        <th>Islemler</th>
    </tr>
    @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->cat_desc }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('category.edit', $category->id) }}">Duzenle</a>
                <a class="btn btn-danger" href="{{ route('category.delete', $category->id) }}">Sil</a>
            </td>
        </tr>
    @endforeach
</table>
@stop