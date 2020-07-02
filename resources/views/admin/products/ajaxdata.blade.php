@extends('layouts.app')

@section('content')
 
  
    <div class="container card ">
        <div class="card-header">Products</div>
        <div class="card-body">
            <table id="table_products" class="table table-hover">

                <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Prix Achat</th>
                    <th>Prix Vente</th>
                </thead>
                
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

        $(document).ready(function(){
            $('#table_products').DataTable({
                'processing' : true,
                "serveSide" :true,
                "ajax": "{{ route('product.gatdata')}}",
                "columns" : [
                    {"data" : "image"},
                    {"data" : "name"},
                    {"data" : "prix_achat"},
                    {"data" : "prix_vente"}
                ]

            })
        });
    </script>

@endsection