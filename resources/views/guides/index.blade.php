@extends('layouts.app')

@section('content')
    <div class="row mb-5">
        <div class="col-12 d-flex justify-content-around">
            <div class="">
                <h2>LIST OF GUIDES</h2>
            </div>
            <div class="">
                <a href="{{ route('guides.create') }}" class="btn btn-success">Create a New Guides</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table w-100">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listGuides as $key => $guide)
                            <tr>
                                <th>{{ ++$i }}</th>
                                <td>{{ $guide->name }}</td>
                                <td>{{ $guide->description }}</td>
                                <td>
                                    <form action="{{ route('guides.destory', $guide->id) }}" method="POST">
                                        <a href="{{ route('guides.show', $guide->id) }}" class="btn btn-info">Show</a>
                                        @can('guide-edit')
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('guide-delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {!! $listGuides->render() !!}
@endsection
