
@extends('Layouts.app')

@section('content')

 @include('admin\includes\errors')
    <div class="card">
        <div class="card-header">
            update sub_Category : {{ $sub_category->name}}
        </div>
        <div class="card-body"> 
            <form action="{{ route('sub_categories.update', $sub_category->id) }}" method="post">
                @method('PUT')
                <div class="form-group"> 
                    <label for="name">Name sub_Category</label>
                <input type="text" name="name" value="{{ $sub_category->name}}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">update sub_Category</button>
                    </div>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection