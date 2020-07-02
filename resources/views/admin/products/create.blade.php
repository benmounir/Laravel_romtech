@extends('layouts.app')

@section('content')

 @include('admin.includes.errors')
 
    <div class="card">
        <div class="card-header">
            create a new product
        </div>
        <div class="card-body"> 
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            <div class="form-group"> 
                <label for="name">name</label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}">
            </div>
            <div class="form-group row ">
                <div class="col-xs-2 ml-3">
                    <label for="price_min">Price Achat</label>
                    <input class="form-control" name="price_min" id="price_min" type="number" min="0" value="{{old('price_min')}}" >
                </div>
                <div class="col-xs-2 ml-2">
                    <label for="price_max">Price Vente</label>
                    <input class="form-control xs" name="price_max" id="price_max" type="number" min="0" value="{{old('price_max')}}">
                </div>
            </div>
            <div class="form-group"> 
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="sub_category">Select a sub_category</label>
                <select name="sub_Category_id" class="form-control" id="sub_Category">
                        <option value="" class="text-center" selected>----------------Select----------------</option>
                        @foreach ($categories as $item)
                            <optgroup label="{{$item->name}}">
                                @foreach ($item->sub_categories as $sub_category)
                                    <option value="{{ $sub_category->id}}">{{$sub_category->name}}</option>
                                @endforeach
                            </optgroup>
                         @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fournisseur">Select a fournisseur</label>
                <select name="fournisseur_id" class="form-control text-center" id="fournisseur">
                    <option value="" class="text-center">----------------Select----------------</option>
                    @foreach ($fournisseurs as $fournisseur)
                        <option value="{{ $fournisseur->id}}">{{$fournisseur->name}}</option>
                    @endforeach

                </select>
            </div>
             <div class="form-group">
                <label for="tags">select tags</label>
                <select name="tags[]" id="tags" class="form-control tags-select" multiple>
                    @forelse ($tags as $tag)
                        <option value="{{$tag->id}}"
                            >{{$tag->tag}}</option>
                    @empty
                         <option value="">No Tags Found</option> 
                    @endforelse
                </select>
            </div>
            <div class="form-group"> 
                <label for="detail">Detail</label>
                <textarea id="detail" name="detail" class="form-control" cols="30" rows="5"></textarea>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Store Product</button>
                </div>
            </div>
            
                {{ csrf_field() }}
            </form>
    </div>
@stop

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
  $('#detail').summernote();
});
   $(document).ready(function() {
       $('.tags-select').select2();
    });
</script>
@endpush