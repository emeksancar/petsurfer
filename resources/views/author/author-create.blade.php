@extends ('layouts.default')

@section('content')
    @include('partials.messages')
<form action="{{ route($route) }}" method="post">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
    @if(isset($author->id))
        <input type="hidden" name="id" value="{{ $author->id }}">
    @endif
        <div class="form-content">
                <label for="first_name">Adi</label>
                <input class="form-control" type="text" name="first_name" value="@if(isset($author->first_name)){{ $author->first_name }}@endif">
        </div>
        <div class="form-content">
                <label for="last_name">Soyadi</label>
                <input class="form-control" type="text" name="last_name" value="@if(isset($author->last_name)){{ $author->last_name }}@endif">
        </div>
        <div class="form-content">
                <label for="country">Ulkesi</label>
                <input class="form-control" type="text" name="country" value="@if(isset($author->country)){{ $author->country }}@endif">
        </div>
        <button type="submit" class="btn btn-success">Kaydet</button>
</form>
@stop