@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Profile') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                <div class="text-center">
                                    {{ $status }}
                                </div>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('user.update', Auth::user()->id) }}">
                            @csrf

                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name', Auth::user()->name) }}" required
                                        autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email', Auth::user()->email) }}" required
                                        autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update User Info') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        {{-- @if (Auth::user()->role != 'admin' && Auth::user()->role != 'owner') --}}
                        <br>
                        <form method="POST" action="{{ route('profile.update', Auth::user()->id) }}">
                            @csrf

                            @method('PUT')
                            <div class="form-group row">
                                <label for="car_type"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Car Type') }}</label>

                                <div class="col-md-6">
                                    <input id="car_type" type="text"
                                        class="form-control @error('car_type') is-invalid @enderror" name="car_type"
                                        value="{{ old('name', Auth::user()->profile()->car_type) }}" required
                                        autocomplete="car_type" autofocus>

                                    @error('car_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="car_model"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Car Model') }}</label>

                                <div class="col-md-6">
                                    <input id="car_model" type="text"
                                        class="form-control @error('car_model') is-invalid @enderror" name="car_model"
                                        value="{{ old('car_model', Auth::user()->profile()->car_model) }}" required
                                        autocomplete="car_model">

                                    @error('car_model')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="from"
                                    class="col-md-4 col-form-label text-md-right">{{ __('From Address') }}</label>

                                <div class="col-md-6">
                                    <select name="from" class="form-control" id="from">
                                        @isset($coll)
                                            <option value="{{ $coll->city_id }}">{{ $coll->city }}</option>
                                        @endisset
                                        @forelse($cities as $city)
                                            @isset($coll->city_id)
                                                @if ($city['id'] == $coll->city_id && $city['city'] == $coll->city)
                                                    @continue
                                                @endif
                                            @endisset
                                            <option value="{{ $city['id'] }}">{{ $city['city'] }}</option>
                                        @empty
                                            <option value="0">no cities</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="to"
                                    class="col-md-4 col-form-label text-md-right">{{ __('To Address') }}</label>

                                <div class="col-md-6">
                                    <select name="to" class="form-control" id="to">
                                        @isset($coll)
                                            <option value="{{ $coll->id }}">{{ $coll->college }}</option>
                                        @endisset
                                        @forelse($colleges as $collge)
                                            @isset($coll->id)
                                                @if ($collge['id'] == $coll->id && $collge['college'] == $coll->college)
                                                    @continue
                                                @endif
                                            @endisset
                                            <option value="{{ $collge['id'] }}">{{ $collge['college'] }}</option>
                                        @empty
                                            <option value="0">No Colleges</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Phone  Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ old('phone', Auth::user()->profile()->phone) }}" required
                                        autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Profile') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
