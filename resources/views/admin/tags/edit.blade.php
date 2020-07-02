
@extends('Layouts.app')

@section('content')

 @include('admin\includes\errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            create a new Tag
        </div>
        <div class="panel-body"> 
            <form action="{{ route('tags.update', $tag->id) }}" method="post">
                @method('PATCH')
            <div class="form-group"> 
                <label for="name">Name Tag</label>
            <input type="text" name="tag" value={{$tag->tag}} class="form-control">
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Tag</button>
                </div>
            </div>
            {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection