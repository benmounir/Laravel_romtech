@extends('Layouts.app')

@section('content')

 @include('admin.includes.errors')
 <div class="card">
    <div class="card-header">
        edit  fournisseur : {{$fournisseur->name}}
    </div>
    <div class="card-body"> 
        <form action="{{ route('fournisseurs.store') }}" method="post">
        <div class="form-group"> 
            <label for="name">name</label>
            <input type="text" name="name" class="form-control" value="{{$fournisseur->name}}">
        </div>
        <div class="form-group"> 
            <label for="contact_number">Contact number</label>
            <input type="text" name="contact_number" class="form-control" value="{{$fournisseur->contact_number}}">
        </div>
        <div class="form-group"> 
            <label for="contact_email">Contact email</label>
            <input type="email" name="contact_email" class="form-control" value="{{$fournisseur->contact_email}}">
        </div>
        
        
        <div class="form-group"> 
            <label for="addresse">Addresse</label>
            <textarea name="addresse" class="form-control" id="addresse"  cols="5" rows="5">{{$fournisseur->addresse}}</textarea>
        </div>
        <div class="form-group">
            <div class="text-center">
                <button class="btn btn-success" type="submit">update fournisseur</button>
            </div>
        </div>
        
            {{ csrf_field() }}
        </form>
</div>
@endsection