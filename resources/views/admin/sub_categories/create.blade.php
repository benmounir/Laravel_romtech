
@extends('Layouts.app')

@section('content')

 @include('admin\includes\errors')
    <div class="card">
        <div class="card-header">
            create a new sub_Category
        </div>
        <div class="card-body"> 
            <form action="{{ route('sub_categories.store') }}" method="post">
            <div class="form-group"> 
                <label for="name">Name sub_Category</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Select a category</label>
                <select name="category_id" class="form-control" id="category">

                    @foreach ($categories as $category)
                        <option value="{{ $category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Store sub_Category</button>
                </div>
            </div>
            {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection