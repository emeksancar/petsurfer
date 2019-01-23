@extends ('layouts.default')

@section('content')
    @include('partials.messages')
<form action="{{ route($route) }}" method="post">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    @if(isset($category->id))
        <input type="hidden" name="id" value="{{ $category->id }}">
    @endif
    <div class="form-content">
        <label for="name">Kategori Adi</label>
        <input class="form-control" type="text" name="name" value="@if(isset($category->name)){{ $category->name }}@endif">
    </div>
    <div class="form-content">
        <label for="cat_desc">Kategori Aciklamasi(Zorunlu Degil)</label>
        <input class="form-control" type="text" name="cat_desc" value="@if(isset($category->cat_desc)){{ $category->cat_desc }}@endif">
    </div>
    <button type="submit" class="btn btn-success">Kaydet</button>
</form>
@stop