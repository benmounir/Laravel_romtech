@extends('layouts.app')

@section('content')
    <div class="form-group">
        <label for="search">Search</label>
        <p>
            <input type="text" name="serach" id="search" class="form-control">
            <h4>Resultas : <span id="result"></span></h4></p>
    </div>
    <div class="d-flex justify-content-end mb-1">
        <a href="{{route('products.create')}}" class="btn btn-success">New product</a>
    </div>
    <div class="card ">
        <div class="card-header">Products</div>
        <div class="card-body">
            <table class="table table-hover">

                <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Prix Achat</th>
                    <th>Prix Vente</th>
                    <th>Sub_Category</th>
                    <th>Fornisseur</th>
                    <th>Editing</th>
                    <th>Trashing</th>
                </thead>
                <tbody>
                   @if ($products->count() > 0)
                        @foreach ($products as $product)
                        <tr>
                                <td><img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-thumbnail" width="80" height="50"></td>
                                <td>{{ $product->name}}</td>
                                <td>{{ $product->Formatprix_achat()}}</td>
                                <td>{{ $product->FormatPrix_vente()}}</td>
                                <td>{{ $product->sub_category->name}}</td>     
                                <td>{{ $product->fournisseur->name}}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id)}}" class="btn btn-xs btn-info">
                                            <span class="glyphicon glyphicon-pencil">
                                                edit
                                            </span>
                                    </a>
                                    </td>
                                <td>
                                        <form action="{{ route('products.destroy', $product->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('are you sure ')" class="btn btn-xs btn-danger">
                                                <span class="glyphicon glyphicon-trash"></span>
                                                    delete
                                            </button>
                                        </form>
                                </td>
                        </tr>
                            
                        @endforeach
                   @else
                        <tr>
                            <th colspan="4" class="text-center">No published products</th>
                        </tr>
                   @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
     console.log('hi im here');
        $(document).ready(function(){
           
          function  fetch_product(query = ''){
                $.ajax({
                    url : "{{ route('liveSearch.action')}}",
                    method : "GET",
                    data : {query:query},
                    dataType:'json'
                    success:function(data){
                        $('tbody').html(data.table_data);
                        $('#result').text(data.total_data);
                    }
                })
            }
            
        });
        $(document).on('search', '#search', function(){
            var query = $(this).val();
            
            fetch_product(query);
        });
    </script>

@endsection