@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dodawanie stanowiska') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('position.store')}}">
                            @csrf
                            <div class="row mb-1">
                                <label for="stanowisko" class="col-md-4 col-form-label text-md-right">{{ __('Nazwa stanowisa') }}</label>
                                <div class="col-md-6">
                                    <input id="stanowisko" type="text"  class="form-control @error('stanowisko') is-invalid @enderror" name="stanowisko" value="{{ old('stanowisko') }}">
                                    <x-error.validator_error name="stanowisko" :message="$message ?? ''"></x-error.validator_error>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="poziom_dostepu" class="col-md-4 col-form-label text-md-right">{{ __('Uprawnienie') }}</label>
                                <div class="col-md-6">
                                    <select id="poziom_dostepu" type="text" class="form-control @error('poziom_dostepu') is-invalid @enderror" name="poziom_dostepu">
                                        @foreach($types as $type)
                                            <option value='{{$type}}'>{{$type}}</option>
                                        @endforeach
                                    </select>
                                    <x-error.validator_error name="poziom_dostepu" :message="$message ?? ''"></x-error.validator_error>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label for="poziom_dostepu" class="col-md-4 col-form-label text-md-right">{{ __('Czynniki szkodliwe') }}</label>
                                <div class="col-md-2">
                                    <label for="chemia" class="col-md-4 col-form-label pb-0  text-md-right w-100">{{ __('Chemia') }}</label>
                                    <input id="chemia" type="checkbox" class="form-check  @error('chemia') is-invalid @enderror" name="chemia" value="1" @checked(old('chemia'))>
                                    <x-error.validator_error name="chemia" :message="$message ?? ''"></x-error.validator_error>
                                </div>
                                <div class="col-md-2">
                                    <label for="halas" class="col-md-4 col-form-label pb-0 text-md-right w-100">{{ __('Hałas') }}</label>
                                    <input id="halas" type="checkbox" class="form-check  @error('halas') is-invalid @enderror" name="halas" value="1" @checked(old('halas'))>
                                    <x-error.validator_error name="halas" :message="$message ?? ''"></x-error.validator_error>
                                </div>
                                <div class="col-md-2">
                                    <label for="inne" class="col-md-4 col-form-label pb-0  text-md-right w-100">{{ __('Inne') }}</label>
                                    <input id="inne" type="checkbox" class="form-check @error('inne') is-invalid @enderror" value="1" name="inne" @checked(old('inne'))  >
                                    <x-error.validator_error name="inne" :message="$message ?? ''"></x-error.validator_error>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{route('position.index')}}" class="me-1"><button type="button" class="btn btn-secondary">{{ __('Powrót') }}</button></a>
                                    <button type="submit" class="btn btn-primary">{{ __('Dodaj stanowisko') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
