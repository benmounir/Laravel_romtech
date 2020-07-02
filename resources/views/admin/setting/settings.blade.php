
@extends('Layouts.app')

@section('content')

 @include('admin\includes\errors')
    <div class="card">
        <div class="card-header">
            edit blog setting
        </div>
        <div class="card-body"> 
            <form action="{{ route('settings.update') }}" method="post">
            <div class="form-group"> 
                <label for="site_name">Site_name</label>
            <input type="text" name="site_name" value="{{$setting->site_name}}" class="form-control">
            </div>
            <div class="form-group"> 
                <label for="contact_email">Contact Email</label>
                <input type="email" name="contact_email" value="{{$setting->contact_email}}" class="form-control">
            </div>
            <div class="form-group"> 
                <label for="contact_number">Contact number</label>
                <input type="text" name="contact_number"  value="{{$setting->contact_number}}" class="form-control">
            </div>
            <div class="form-group"> 
                <label for="address">Address</label>
                <input type="text" name="address" value="{{$setting->address}}" class="form-control">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">update setting</button>
                </div>
            </div>
            {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection