@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="container">
            <h2>Add a New Coach</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('store.coaches') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Coach Name:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Position</label>
                    <input type="text" name="position" class="form-control" />
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Facebook:</label>
                    <input type="text" name="facebook" class="form-control" />
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image:</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Add Coach</button>
            </form>
        </div>
    @endsection
