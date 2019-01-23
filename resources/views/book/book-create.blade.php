@extends ('layouts.default')

@section('content')
    @include('partials.messages')
<form action="{{ route($route) }}" method="post">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    @if(isset($book->id))
        <input type="hidden" name="id" value="{{ $book->id }}">
    @endif
    <div class="form-content">
        <label for="name">Kitap Adi</label>
        <input class="form-control" type="text" name="name" value="@if(isset($book->name)){{ $book->name }}@endif">
    </div>
    <div class="form-content">
        <label for="category">Kategori</label>
        <select class="form-control" name="category" id="">
            @foreach($cats as $cat)
                @if(isset($book) and $book->category == $cat->id)
                    <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
                @else
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-content">
        <label for="author">Yazar</label>
        <select class="form-control" name="author" id="">
            @foreach($authors as $author)
                @if(isset($book) and $book->author == $author->id)
                    <option value="{{ $author->id }}" selected>{{ $author->first_name }} {{ $author->last_name }}</option>
                @else
                    <option value="{{ $author->id }}">{{ $author->first_name }} {{ $author->last_name }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-content">
        <label for="isbn">Isbn</label>
        <input class="form-control" type="text" name="isbn" value="@if(isset($book->isbn)){{ $book->isbn }}@endif">
    </div>
    <button type="submit" class="btn btn-success">Kaydet</button>
</form>
@stop