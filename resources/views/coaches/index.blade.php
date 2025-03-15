@extends('layouts.app')
@section('content')
    <div class="coaches-area-three pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color">Coaches</span>
                <h2>Let's Meet Up With Our Special coaches Members</h2>
            </div>
            <div class="coaches-slider-two owl-carousel owl-theme pt-45">

                <div class="col-md-8">
                    <i class="fas fa-person-workspace"></i> Coaches:
                    <a href="{{ route('add.coaches') }}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i>
                        Create Coaches</a>


                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="coaches-container">
                                    @foreach ($coaches as $coach)
                                        <div class="coaches-item">
                                            <img src="{{ asset('coaches_images/' . $coach->image) }}" alt="{{ $coach->name }}" width="200">
                                            <div class="content">
                                                <h3>{{ $coach->name }}</h3>
                                                <span>{{ $coach->position }}</span>
                                                <p><a href="{{ $coach->facebook }}" target="_blank">Facebook Profile</a></p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    @endsection
