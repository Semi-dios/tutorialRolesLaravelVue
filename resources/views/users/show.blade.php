@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mb-3 d-flex justify-content-around">
            <div>
                <h2>Show Learner</h2>
            </div>
            <div>
                <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-6 ">
                <div class="card border-dark mb-3">
                    <div class="card-header">
                        <strong>Name: </strong>
                        {{ $user->name }}

                    </div>
                    <div class="card-body text-dark">
                        <strong>Email: </strong>
                        {{ $user->email }}
                        <br>
                        <strong>Roles: </strong>
                        @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $rol)
                                <span class="small badge badge-success">{{ $rol }}</span>
                            @endforeach
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
