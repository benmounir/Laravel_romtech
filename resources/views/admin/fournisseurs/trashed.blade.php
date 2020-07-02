@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Trashed Posts</div>
        <div class="card-body">
            <table class="table table-hover">

                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Restore</th>
                    <th>Destroy</th>
                </thead>
                <tbody>
                  @if ($products->count()> 0)
                        @foreach ($products as $product)
                        <tr>
                            <td><img src="{{ $product->image }}" alt="{{ $product->title }}" width="80" height="50"></td>
                            <td>{{ $product->title}}</td>
                            <td>
                                <a href="{{ route('product.restore',["id" => $product->id])}}" class="btn btn-xs btn-success">
                                        <span class="glyphicon glyphicon-trash">
                                            restore
                                        </span>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('product.kill',["id" => $product->id])}}" class="btn btn-xs btn-danger">
                                        <span class="glyphicon glyphicon-pencil">
                                            delete permantly
                                        </span>
                                </a>
                            </td>
                
                        </tr>
                        @endforeach
                  @else
                      <tr>
                          <th colspan="4" class="text-center">No trashed products</th>
                      </tr>
                  @endif
                </tbody>
            </table>
        </div>
    </div>


@endsection 