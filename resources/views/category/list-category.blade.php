<form action="{{ route('category.list') }}" method="get">
    <input type="text" name="keyword" value="{{ app('request')->input('keyword') }}">
    <button type="submit" class="btn btn-success">Ara</button>
</form>

<a href="{{ route('category.create') }}">Yeni Kategori Ekle</a>

<h2>Kategoriler</h2>

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
                <a href="{{ route('category.edit', $category->id) }}">Duzenle</a>
                <a href="{{ route('category.delete', $category->id) }}">Sil</a>
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