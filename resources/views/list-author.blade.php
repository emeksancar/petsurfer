<form action="{{ route('author.list') }}" method="get">
    <input type="text" name="keyword" value="{{ app('request')->input('keyword') }}">
    <button type="submit" class="btn btn-success">Ara</button>
</form>

<h2>Yazarlar</h2>

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
                <a href="{{ route('author.edit', $author->id) }}">Duzenle</a>
                <a href="{{ route('author.delete', $author->id) }}">Sil</a>
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
