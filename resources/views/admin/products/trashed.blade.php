@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-1">
        @if ($products->count() > 0)
            <a href="{{route('product.killAll')}}" 
            onclick="confirm('are your sure you want deleted alll')"
            class="btn btn-danger">Delete all permantly</a>
             <a href="{{route('product.restoreAll')}}" class="btn btn-success ml-2">Restore all permantly</a>
        @endif
        
    </div>
    <div class="card ">
        <div class="card-header">Trashed Products</div>
        <div class="card-body">
            <table class="table table-hover">

                <thead>
                    <th>Image</>
                    <th>Name</th>
                    <th>Prix Achat</th>
                    <th>Prix Vente</th>
                    <th>Sub_Category</th>
                    <th>Fornisseur</th>
                    <th>Restore</th>
                    <th>Destroy</th>
                </thead>
                <tbody>
                  @if ($products->count()> 0)
                    @foreach ($products as $product)
                    <tr>
                            <td><img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-thumbnail" width="80" height="50"></td>
                            <td>{{ $product->name}}</td>
                            <td>{{ $product->prix_achat}}</td>
                            <td>{{ $product->prix_vente}}</td>
                            <td>{{ $product->sub_category->name}}</td>     
                            <td>{{ $product->fournisseur->name}}</td>
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