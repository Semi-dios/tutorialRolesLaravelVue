@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mb-3 d-flex justify-content-around">
            <div>
                <h2>SHOW ROLE</h2>
            </div>
            <div>
                <a href="{{ route('roles.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-6 ">
                <div class="card border-dark mb-3">
                    <div class="card-header">
                        <strong>Name: </strong>
                        {{ $role->name }}

                    </div>
                    <div class="card-body text-dark">

                        <strong>Permissions: </strong>
                        @if (!empty($rolePermissions))
                            @foreach ($rolePermissions as $rolPe)
                                <span class="small badge badge-success">{{ $rolPe->name }}</span>
                            @endforeach
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
