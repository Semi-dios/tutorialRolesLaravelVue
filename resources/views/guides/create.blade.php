@extends('layouts.app')

@section('content')
    <div class="row mb-5">
        <div class="col-12 d-flex justify-content-around">
            <div class="">
                <h2>CREATE NEW GUIDE</h2>
            </div>
            <div class="">
                <a href="{{ route('guides.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    @if ($errors->all())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                <form action="{{ route('guides.store') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group  col-12">
                            <strong>Name: </strong>
                            <input type="text" name="name" id="" placeholder="Name" class="form-control">
                        </div>
                        <div class="form-group  col-12">
                            <strong>Description: </strong>
                            <textarea name="description" id="" placeholder="Description" cols="40" rows="10"
                                class="form-control"></textarea>
                        </div>
                        <div class="form-group  col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>


    @endsection
