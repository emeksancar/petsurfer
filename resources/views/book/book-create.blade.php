<form action="{{ route($route) }}" method="post">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    @if(isset($book->id))
        <input type="hidden" name="id" value="{{ $book->id }}">
    @endif
    <input type="text" name="name" value="@if(isset($book->name)){{ $book->name }}@endif">
    <select name="category" id="">
        @foreach($cats as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
    </select>
    <select name="author" id="">
        @foreach($authors as $author)
            <option value="{{ $author->id }}">{{ $author->first_name }} {{ $author->last_name }}</option>
        @endforeach
    </select>
    <input type="text" name="isbn" value="@if(isset($book->isbn)){{ $book->isbn }}@endif">
    <button type="submit" class="btn btn-success">Kaydet</button>
</form>