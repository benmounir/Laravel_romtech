@if (count($errors)>0)
<ul class="list-group">
    @foreach ($errors->all() as $error)
        <li class="list-group-item text-danger">{{ $error}}</li>
        @break
    @endforeach
</ul>
@endif