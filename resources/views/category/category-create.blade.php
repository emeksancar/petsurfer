<form action="{{ route($route) }}" method="post">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    @if(isset($category->id))
        <input type="hidden" name="id" value="{{ $category->id }}">
    @endif
    <input type="text" name="name" value="@if(isset($category->name)){{ $category->name }}@endif">
    <input type="text" name="cat_desc" value="@if(isset($category->cat_desc)){{ $category->cat_desc }}@endif">
    <button type="submit" class="btn btn-success">Kaydet</button>
</form>