<form action="{{ route($route) }}" method="post">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    <input type="text" name="first_name" value="{{ isset($author->first_name) }}">
    <input type="text" name="last_name" value="{{ isset($author->last_name) }}">
    <input type="text" name="country" value="{{ isset($author->country) }}">
    <button type="submit" class="btn btn-success">Kaydet</button>
</form>