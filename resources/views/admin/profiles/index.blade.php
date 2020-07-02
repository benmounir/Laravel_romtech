
@extends('layouts.app')

@section('content')

 @include('admin\includes\errors')
    <div class="card">
        <div class="card-header">
            Update your profile
        </div>
        <div class="card-body"> 
            <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
            <div class="form-group"> 
                <label for="name">user name</label>
            <input type="text" name="name" value="{{ $user->name}}" class="form-control">
            </div>
            <div class="form-group"> 
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ $user->email}}" class="form-control">
            </div>
            <div class="form-group"> 
                <label for="password">new password</label>
                <input type="password" name="password"  class="form-control">
            </div>
            <div class="form-group"> 
                <label for="avatar">Upload a new avatar</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <div class="form-group"> 
                <label for="facebook">Facebook</label>
                <input type="text" name="facebook" value="{{ $user->profile->facebook}}" class="form-control">
            </div>
            <div class="form-group"> 
                <label for="youtube">Youtube</label>
                <input type="text" name="youtube" value="{{ $user->profile->youtube}}" class="form-control">
            </div>
            <div class="form-group"> 
                <label for="about">About you</label>
                <textarea name="about" id="about" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" value="{{ $user->profile->about}}" type="submit">Update profile</button>
                </div>
            </div>
            {{ csrf_field() }}
            </form>
        </div>
    </div>
@stop
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css">
@stop


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function(){
        $('#about').summernote();
    });
</script>

@endsection