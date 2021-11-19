@extends('layouts.app')

@section('content')
    <div class="row mb-5">
        <div class="col-12 d-flex justify-content-around">
            <div class="">
                <h2>CREATE NEW ROLE</h2>
            </div>
            <div class="">
                <a href="{{ route('roles.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-12">
                {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
                <div class="form-row">
                    <div class="form-group  col-12">
                        <strong>Name: </strong>
                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group  col-12"><strong>Permission: </strong>
                        <br>
                        @foreach ($permission as $value)
                            <label>
                                {{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }} -
                                {{ $value->name }}
                            </label>
                        @endforeach

                        <div class="form-group  col-12">
                            <div type="submit" class="btn btn-primary">
                                Submit
                            </div>
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>


    @endsection
