@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Location') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                <div class="text-center">
                                    {{ $status }}
                                </div>
                            </div>
                        @endif
                        @can('edit-admins')

                            <form method="POST" action="{{ route('location.create') }}">
                                @csrf

                                {{-- @method('PUT') --}}
                                <div class="form-group row">
                                    <label for="City" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                                    <div class="col-md-6">
                                        <input id="City" type="text" class="form-control @error('City') is-invalid @enderror"
                                            name="City" value="" required autocomplete="City" autofocus>

                                        @error('City')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add City') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <br>
                        @endcan

                        @can('edit-users')
                            <form method="POST" action="{{ route('college.create') }}">
                                @csrf

                                {{-- @method('PUT') --}}
                                <div class="form-group row">
                                    <label for="College"
                                        class="col-md-4 col-form-label text-md-right">{{ __('College') }}</label>

                                    <div class="col-md-6">
                                        <input id="College" type="text"
                                            class="form-control @error('College') is-invalid @enderror" name="College" value=""
                                            required autocomplete="College" autofocus>

                                        @error('College')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Cityselect"
                                        class="col-md-4 col-form-label text-md-right">{{ __('City select') }}</label>

                                    <div class="col-md-6">
                                        <select name="Cityselect" class="form-control" id="Cityselect">
                                            @isset($coll->city_id)
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
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add College') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <br>
                        @endcan

                        @can('edit-location')

                            <form method="POST" action="{{ route('address.create') }}">
                                @csrf

                                {{-- @method('PUT') --}}
                                {{-- <div class="form-group row">
                            <label for="Cityselect" class="col-md-4 col-form-label text-md-right">{{ __('City select') }}</label>

                            <div class="col-md-6">
                                    <select name="Cityselect" class="form-control" id="Cityselect">
                                        <option value="{{ $coll->city_id }}">{{ $coll->city }}</option>
                                        @forelse($cities as $city)
                                        @if ($city['id'] == $coll->city_id && $city['city'] == $coll->city)
                                         @continue
                                            @else
                                            <option value="{{ $city['id'] }}">{{ $city['city'] }}</option>
                                        @endif
                                        @empty
                                        <option value="">no cities</option>
                                        @endforelse
                                    </select>
                            </div>
                        </div> --}}
                                {{-- <div class="form-group row">
                            <label for="Collegeselect" class="col-md-4 col-form-label text-md-right">{{ __('College select') }}</label>

                            <div class="col-md-6">
                                    <select name="Collegeselect" class="form-control" id="Collegeselect">
                                        <option value="{{ $coll->id }}">{{ $coll->college }}</option>
                                        @forelse($colleges as $collge)
                                        @if ($collge['id'] == $coll->id && $collge['college'] == $coll->college)
                                        @continue
                                           @else
                                           <option value="{{ $collge['id'] }}">{{ $collge['college'] }}</option>
                                       @endif
                                        @empty
                                        <option value="">No Colleges</option>
                                        @endforelse
                                    </select>
                            </div>
                        </div> --}}
                            
                                <div class="form-group row">
                                    <label for="Address"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="Address" type="text"
                                            class="form-control @error('Address') is-invalid @enderror" name="Address" value=""
                                            required autocomplete="Address" autofocus>

                                        @error('Address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                            <div class="form-group row">
                                <label for="price"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror"
                                        name="price" value="{{ old('price', Auth::user()->profile()->price) }}" required
                                        autocomplete="price">

                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                                
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add Address') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
