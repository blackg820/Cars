@extends('layouts.app')

@section('title', 'Welcome page')

@section('content')
    {{-- <div class="bcg">
        <img src="{{ asset('photos/carLogo.png') }}" class="rounded mx-auto d-block">
    </div> --}}
    <div>
        <div class="container-fluid">
                        @isset ($status)
                            <div class="alert alert-success">
                                <div class="text-center">
                                    {{ $status }}
                                </div>
                            </div>
                        @endisset
                        @isset ($statuss)
                            <div class="alert alert-danger">
                                <div class="text-center">
                                    {{ $statuss }}
                                </div>
                            </div>
                        @endisset
            <div class="row align-self-center">
                @isset($users)
                    @forelse($users as $user)
                        <div class="col-xl-6 col-12  p-3 ">
                            <div class="card border-dark">
                                <div class="card-header"><x-bi-person /> {{ $user->name }}</div>
                                <div class="card-body">
                                    {{-- <div class="d-flex justify-content-center"> --}}
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <h5 class="card-title">
                                                <x-bi-person /> {{ $user->name }}
                                            </h5>
                                            <p class="card-text">
                                                <x-bi-envelope /> {{ $user->email }}
                                            </p>
                                            <p class="card-text">
                                                <x-bi-telephone /> {{ $user->phone }}
                                            </p>
                                            <p class="card-text">
                                                <x-bi-geo-alt /> {{ $user->city }} - {{ $user->address }}
                                            </p>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <p class="card-text">
                                                <x-bi-geo-alt-fill /> {{ $user->college }}
                                            </p>
                                            <p class="card-text"><i class="fa fa-car"></i> {{ $user->car_type }}</p>
                                            <p class="card-text"><i class="fa fa-car"></i> {{ $user->car_model }}</p>
                                            <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                                    <path
                                                        d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                                    <path
                                                        d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                                    <path
                                                        d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                                </svg> {{ $user->price }}</p>
                                        </div>
                                    </div>
                                    {{-- </div> --}}
                                </div>
                            </div>
                            {{-- <div class="card">
                                <div class="card-body">

                                </div>
                            </div> --}}
                        </div>
                    @empty
                        <div class="card border-dark">
                            <div class="card-header"><x-bi-exclamation-triangle/> No Result Was found</div>
                            <div class="card-body">
                                <h5>Check the spilling or your college or change car model and Try agin....!</h5>
                            </div>
                        </div>
                </div>
                @endforelse
            @endisset
        </div>
    </div>
    </div>
@endsection
