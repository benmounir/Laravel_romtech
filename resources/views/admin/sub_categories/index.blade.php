@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('sub_categories.create')}}" class="btn btn-success">New Sub_category</a>
    </div>
    <div class="card">
        <div class="card-header">
            sub_categories
        </div>
        <div class="card-body">
            <table class="table table-hover">

                <thead>
                    <th>Sub_Category</th>
                    <th>Category</th>
                    <th>Editing</th>
                    <th>deleting</th>
                </thead>
                <tbody>
                   @if ($sub_categories->count() > 0)
                            @foreach ($sub_categories as $sub_category)
                            <tr>
                                <td>{{$sub_category->name}}</td>
                                <td>{{$sub_category->category->name}}</td>
                                <td>
                                <a href="{{ route('sub_categories.edit', $sub_category->id)}}" class="btn btn-xs btn-info">
                                        <span class="glyphicon glyphicon-pencil">
                                            edit
                                        </span>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('sub_categories.destroy', $sub_category->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                            <button type="submit"onclick="return confirm('are you sure you want delete {{$sub_category->name}} ')" class="btn btn-xs btn-danger ">
                                                <span class="glyphicon glyphicon-trash"></span>
                                                delete
                                            </button>
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach
           
                   @else
                       <tr>
                           <th class="text-center" colspan="3">No Sub_Category yet</th>
                       </tr>
                   @endif
                </tbody>
            </table>
            
        </div>
    </div>


@endsection