@extends('Layouts.app')

@section('content')

 @include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            {{isset($fournisseur) ? 'Edit Fournisseur' : 'create fournisseur'}}
        </div>
        <div class="card-body"> 
            <form action="{{ isset($fournisseur) ? route('fournisseurs.update' , $fournisseur->id) : route('fournisseurs.store') }}" method="post">
                @csrf
                
                @if (isset($fournisseur))
                     @method('PUT')
                @endif
               
                <div class="form-group"> 
                <label for="name">name</label>
                <input type="text" name="name" class="form-control" value="{{isset($fournisseur) ? $fournisseur->name : old('name')}}">
            </div>
            <div class="form-group"> 
                <label for="contact_number">Contact number</label>
                <input type="text" name="contact_number" class="form-control" value="{{isset($fournisseur) ? $fournisseur->contact_number : old('contact_number')}}">
            </div>
            <div class="form-group"> 
                <label for="contact_email">Contact email</label>
                <input type="email" name="contact_email" class="form-control" value="{{isset($fournisseur) ? $fournisseur->contact_email : old('contact_email')}}">
            </div>
            
            
            <div class="form-group"> 
                <label for="addresse">Addresse</label>
                <textarea name="addresse" class="form-control" id="addresse"  cols="5" rows="5">{{isset($fournisseur) ? $fournisseur->addresse : old('addresse')}}
                </textarea>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        {{isset($fournisseur) ? 'update fournisseur' : 'save fournisseur'}} </button>
                </div>
            </div>
            
                {{ csrf_field() }}
            </form>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('js/summernote/suummernote.min.css')}}">
@endsection


@section('scripts')
<script src="{{ asset('js/summernote/summernote.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#content').summernote();
    });

</script>

@endsection