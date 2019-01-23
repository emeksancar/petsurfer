<form action="{{ route($route) }}" method="post">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
    @if(isset($author->id))
        <input type="hidden" name="id" value="{{ $author->id }}">
    @endif
        <input type="text" name="first_name" value="@if(isset($author->first_name)){{ $author->first_name }}@endif">
        <input type="text" name="last_name" value="@if(isset($author->first_name)){{ $author->last_name }}@endif">
        <input type="text" name="country" value="@if(isset($author->first_name)){{ $author->country }}@endif">
        <button type="submit" class="btn btn-success">Kaydet</button>
</form>