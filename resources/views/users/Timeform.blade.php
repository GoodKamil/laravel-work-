@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bilans godzin') }}</div>

                <div class="card-body">
                    <form method="POST" action="/users/montho">
                        @csrf

                        <div class="row mb-3">
                            <label for="pracownik" class="col-md-4 col-form-label text-md-right">{{ __('Pracownik') }}</label>

                            <div class="col-md-6">
                                <select id="pracownik" type="text" class="form-control @error('pracownik') is-invalid @enderror" name="pracownik">
                                  @foreach($users as $user)
                                  <option @selected(old('pracownik')==$user->id) value='{{$user->id}}'>{{$user->name}} {{$user->surname}}</option>
                                  @endforeach
                                  </select>
                                <x-error.validator_error name="pracownik" :message="$message ?? ''"></x-error.validator_error>
                            </div>
                        </div>
                        <x-select.date></x-select.date>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Sprawdź') }}
                                </button>
                                <br>
                                @if(request()->method()=='POST')
                                <div class="alert mt-4 alert-success d-flex align-items-center justify-content-center">
                                  Liczba godzin pracownika w danym zakresie wynosi {{$timeWord}}h.
                                </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
