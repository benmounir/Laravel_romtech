
@extends('Layouts.app')

@section('content')

 @include('admin\includes\errors')
    <div class="card">
        <div class="card-header">
            create a new Category
        </div>
        <div class="card-body"> 
            <form action="{{ route('categories.store') }}" method="post">
            <div class="form-group"> 
                <label for="name">Name Category</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Store Category</button>
                </div>
            </div>
            {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection