@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edytowanie rejestru czasuu pracy') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('workingTimeUser.edit',[$user->id])}}">
                            @csrf
                            <div class="row mb-1">
                                <label for="pracownik" class="col-md-4 col-form-label text-md-right">{{ __('Pracownik') }}</label>
                                <div class="col-md-6">
                                    <input type="hidden" value="{{$user->id_pracownika}}" name="id_pracownika">
                                    <input id="pracownik" disabled type="text" class="form-control @error('pracownik') is-invalid @enderror" name="pracownik" value="{{ $user->User->name . ' '.$user->User->surname }}">
                                    <x-error.validator_error name="id_pracownika" :message="$message ?? ''"></x-error.validator_error>
                                </div>

                            </div>

                            <div class="row mb-1">
                                <label for="godziny" class="col-md-4 col-form-label text-md-right">{{ __('Czas pracy') }}</label>
                                <div class="col-md-6">
                                    <input id="godziny" type="number" class="form-control @error('godziny') is-invalid @enderror" name="godziny" value="{{ old('godziny',$user->godziny ?? 0 ) }}">
                                    <x-error.validator_error name="godziny" :message="$message ?? ''"></x-error.validator_error>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Data') }}</label>
                                <div class="col-md-6">
                                    <input id="data" type="date" class="form-control @error('dzien') is-invalid @enderror" value="{{old('dzien',$user->dzien ?? '')}}" name="dzien">
                                    <x-error.validator_error name="dzien" :message="$message ?? ''"></x-error.validator_error>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label for="opis" class="col-md-4 col-form-label text-md-right">{{ __('Opis') }}</label>
                                <div class="col-md-6">
                                    <textarea id="opis" type="text" class="form-control" name="opis">{{old('opis',$user->opis ?? '')}}</textarea>
                                    <x-error.validator_error name="opis" :message="$message ?? ''"></x-error.validator_error>
                                </div>

                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{route('workingTimeUser.show',[$user->id_pracownika])}}" class="me-1"><button type="button" class="btn btn-secondary">{{ __('Powrót') }}</button></a>
                                    <button type="submit" class="btn btn-primary">{{ __('Edytuj czas pracy') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
