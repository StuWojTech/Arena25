@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('management.inc.sidebar')

            <div class="col-md-8">
                <i class="fas fa-house"></i> Hall
                <a href="{{ route('hall.create') }}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i>
                    Create Hall</a>

                <hr>
                @if (Session()->has('status'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        {{ Session()->get('status') }}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>

                    @foreach ($halls as $hall)
                        <tr>
                            <td>{{ $hall->id }}</td>
                            <td>{{ $hall->name }}</td>
                            <td>{{ $hall->price }}</td>
                            <td>
                                <img src="{{ asset('hall_images') }}/{{ $hall->image }}" alt="{{ $hall->name }}"
                                    width="120px" height="120px" class="img-thumbnail">
                            </td>
                            <td>{{ $hall->description }}</td>
                            <td>{{ $hall->category->name }}</td>
                            <td><a href="/management/hall/{{ $hall->id }}/edit" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="/management/hall/{{ $hall->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
