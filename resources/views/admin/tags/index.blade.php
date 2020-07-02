@extends('layouts.app')

@section('content')
        <div class="d-flex justify-content-end mb-2">
            <a href="{{route('tags.create')}}" class="btn btn-success">New tag</a>
        </div>

    <div class="card">
        <div class="card-header">
            Tags
        </div>
        <div class="card-body">
            <table class="table table-hover">

                <thead>
                    <th>Tag name</th>
                    <th>Product count</th>
                    <th>Editing</th>
                    <th>deleting</th>
                </thead>
                <tbody>
                   @if ($tags->count() > 0)
                            @foreach ($tags as $tag)
                            <tr>
                                <td>{{$tag->tag}}</td>
                                <td>{{$tag->products->count()}}</td>
                                <td>
                                <a href="{{ route('tags.edit', $tag->id)}}" class="btn btn-xs btn-info">
                                        <span class="glyphicon glyphicon-pencil">
                                            edit
                                        </span>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('tags.destroy', $tag->id)}}" method="POST" >
                                        @method('delete')
                                        @csrf
                                        <button type="submit"  onclick="return confirm('are your sure you want deleted {{$tag->tag}}  ?')" class="btn btn-xs btn-danger">
                                             <span class="glyphicon glyphicon-trash">
                                                delete
                                            </span>
                                        </button>
                                     </form>
                                 </td>
                            </tr>
                        @endforeach
           
                   @else
                       <tr>
                           <th class="text-center" colspan="3">No tags yet</th>
                       </tr>
                   @endif
                </tbody>
            </table>
        </div>
    </div>


@endsection