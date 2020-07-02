
@extends('Layouts.app')

@section('content')

 @include('admin\includes\errors')
    <div class="card-primary">
        <div class="card-header">
            create a new Tag
        </div>
        <div class="card-body"> 
            <form action="{{ route('tags.store') }}" method="post">
            <div class="form-group"> 
                <label for="name">Name Tag</label>
                <input type="text" name="tag" class="form-control">
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Store Tag</button>
                </div>
            </div>
            {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection