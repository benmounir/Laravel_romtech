@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb2">
        <a href="{{route('categories.create')}}" class="btn btn-success mb-2">New category</a>
    </div>
    <div class="card">
        <div class="card-header">
            Categories
        </div>
        <div class="card-body">
            <table class="table table-hover">

                <thead>
                    <th>Category name</th>
                    <th>Editing</th>
                    <th>deleting</th>
                </thead>
                <tbody>
                   @if ($categories->count() > 0)
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>
                                <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-xs btn-info">
                                        <span class="glyphicon glyphicon-pencil"></span>edit
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('categories.destroy', $category->id)}}"  method="post">
                                        @csrf
                                        @method('delete')
                                    <button type="submit"  onclick="return confirm('are you sure ')" class="btn btn-xs btn-danger">delete</button>
                                    </form>
                                 </td>
                            </tr>
                        @endforeach
           
                   @else
                       <tr>
                           <th class="text-center" colspan="3">No Category yet</th>
                       </tr>
                   @endif
                </tbody>
            </table>
        </div>
    </div>


@endsection