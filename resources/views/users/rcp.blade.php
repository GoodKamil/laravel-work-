@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Rejestr Czasu Pracy') }}</div>

                <div class="card-body">
                    <form method="POST" action="/users">
                        @csrf
                        <div class="row mb-1">
                            <label for="pracownik" class="col-md-4 col-form-label text-md-right">{{ __('Pracownik') }}</label>

                            <div class="col-md-6">
                                <select id="pracownik" type="text" class="form-control @error('id_pracownika') is-invalid @enderror" name="id_pracownika" value="{{ old('id_pracownika') }}">
                                  @foreach($users as $user)
                                  <option @selected(old('id_pracownika')==$user->id) value='{{$user->id}}'>{{$user->name}} {{$user->surname}}</option>
                                  @endforeach
                                  </select>
                                <x-error.validator_error name="id_pracownika" :message="$message ?? ''"></x-error.validator_error>
                            </div>

                        </div>

                        <div class="row mb-1">
                            <label for="godziny" class="col-md-4 col-form-label text-md-right">{{ __('Czas pracy') }}</label>
                            <div class="col-md-6">
                                <input id="godziny" type="number" class="form-control @error('godziny') is-invalid @enderror" name="godziny" value="{{ old('godziny') }}">
                                <x-error.validator_error name="godziny" :message="$message ?? ''"></x-error.validator_error>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Data') }}</label>
                            <div class="col-md-6">
                                <input id="data" type="date" class="form-control @error('dzien') is-invalid @enderror" name="dzien" value="{{old('dzien')}}">
                                <x-error.validator_error name="dzien" :message="$message ?? ''"></x-error.validator_error>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <label for="opis" class="col-md-4 col-form-label text-md-right">{{ __('Opis') }}</label>
                            <div class="col-md-6">
                                <textarea id="opis" type="text" class="form-control" name="opis"> {{old('opis')}}</textarea>
                                <x-error.validator_error name="opis" :message="$message ?? ''"></x-error.validator_error>
                            </div>

                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Dodaj czas pracy') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
