@extends('Layouts.app')

@section('content')

 @include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            Edit : {{ $product->name}}
        </div>
        <div class="card-body"> 
            <form action="{{ route('products.update',   $product->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
                <div class="form-group"> 
                    <label for="name">name</label>
                    <input type="text" name="name" value="{{ $product->name}}" class="form-control">
                </div>
                <div class="form-group row">
                    <div class="col-xs-2">
                        <label for="price_min">Price Achat</label>
                        <input class="form-control" name="price_min" id="price_min" type="number" min="0" value="{{$product->prix_achat}}" >
                    </div>
                    <div class="col-xs-2">
                        <label for="price_max">Price Vente</label>
                        <input class="form-control" name="price_max" id="price_max" type="number" min="0" value="{{$product->prix_vente}}">
                    </div>
                </div>
                <div class="form-group"> 
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">Select a category</label>
                    <select name="SubCategory_id" class="form-control" id="category">

                        @foreach ($sub_categories as $sub_category)
                            <option value="{{ $sub_category->id}}"
                            @if ($product->sub_category->id == $sub_category->id)
                                selected
                            @endif    
                                
                            >{{$sub_category->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="fournisseur">Select a fournisseur</label>
                    <select name="fournisseur_id" class="form-control" id="fournisseur">

                        @foreach ($fournisseurs as $fournisseur)
                            <option value="{{ $fournisseur->id}}"
                            @if ($product->Fournisseur->id == $fournisseur->id)
                                selected
                            @endif    
                                
                            >{{$fournisseur->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">select tags</label>
                    <select name="tags[]" id="tags" class="form-control tags-select" multiple>
                        @forelse ($tags as $tag)
                            <option value="{{$tag->id}}"
                                @if($product->hasTags($tag->id))
                                    selected
                                @endif
                                >{{$tag->tag}}</option>
                        @empty
                            <option value="">No Tags Found</option> 
                        @endforelse
                    </select>
                </div>
                <div class="form-group"> 
                    <label for="detail">detail</label>
                    <textarea   name="detail" 
                                class="form-control" 
                                id="detail" cols="5" rows="5"
                                >{{ $product->detail}}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Edit Product</button>
                    </div>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection