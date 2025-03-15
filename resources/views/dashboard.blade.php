@extends('layouts.app')

@section('content')
    <div class="container text-center mt-5">
        <div class="row justify-content-center">
            <!-- Management -->
            <div class="col-md-4">
                <a href="/management" class="text-decoration-none">
                    <div class="card p-4">
                        <img src="{{ asset('images/project-management.png') }}" class="img-fluid mb-2" width="80" alt="Management">
                        <h5>Management</h5>
                    </div>
                </a>
            </div>

            <!-- Coaches -->
            <div class="col-md-4">
                <a href="/coaches" class="text-decoration-none">
                    <div class="card p-4">
                        <img src="{{ asset('images/coach.png') }}" class="img-fluid mb-2" width="80" alt="Coaches">
                        <h5>Coaches</h5>
                    </div>
                </a>
            </div>

            <!-- Report -->
            <div class="col-md-4">
                <a href="/report" class="text-decoration-none">
                    <div class="card p-4">
                        <img src="{{ asset('images/document.png') }}" class="img-fluid mb-2" width="80" alt="Report">
                        <h5>Report</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
