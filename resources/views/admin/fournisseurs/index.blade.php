@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('fournisseurs.create')}}" class="btn btn-success">New fournisseur</a>
    </div>

    <div class="card">
        <div class="card-header">fournisseurs</div>
        <div class="card-body">
            <table class="table table-hover">

                <thead>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Contact Email</th>
                    <th>Address</th>
                    <th>Editing</th>
                    <th>Trashing</th>
                </thead>
                <tbody>
                   @if($fournisseurs->count() > 0)
                        @foreach ($fournisseurs as $fournisseur)
                            <tr>
                                    <td>{{ $fournisseur->name}}</td>
                                    <td>0-{{ $fournisseur->contact_number}}</td>
                                    <td>{{ $fournisseur->contact_email}}</td>     
                                    <td>{{ $fournisseur->addresse}}</td>
                                    <td>     
                                            <a href="{{ route('fournisseurs.edit' , $fournisseur->id)}}" class="btn btn-xs btn-info">
                                                <span class="glyphicon glyphicon-pencil">
                                                    edit
                                                </span>
                                        </a>
                                        </td>
                                    <td>
                                        <form action="{{route('fournisseurs.destroy' , $fournisseur->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                    class="btn btn-xs btn-danger"
                                                    onclick="return confirm('Are you sure you want delete {{$fournisseur->name}} ?')"
                                                    >
                                                    <span class="glyphicon glyphicon-trash">
                                                        delete
                                                    </span>
                                                </button>
                                        </form>
                                    </td>
                            </tr> 
                        @endforeach
                   @else
                        <tr>
                            <th colspan="4" class="text-center">No published fournisseurs</th>
                        </tr>
                   @endif
                   
                   
                </tbody>
            </table>

        </div>
    </div>


@endsection

