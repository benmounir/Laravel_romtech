
@extends('Layouts.app')

@section('content')

 @include('admin\includes\errors')
    <div class="card">
        <div class="card-header">
            update Category : {{ $category->name}}
        </div>
        <div class="card-body"> 
            <form action="{{ route('categories.update',  $category->id) }}" method="post">
                @method('PUT')
            <div class="form-group"> 
                <label for="name">Name Category</label>
            <input type="text" name="name" value="{{ $category->name}}" class="form-control">
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">update Category</button>
                </div>
            </div>
            {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection