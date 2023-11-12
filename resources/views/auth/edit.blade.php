@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                  @can('isBoss')
                    <form method="POST" action="/users/edit/{{$datas['id']}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Imię') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$datas['name']}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nazwisko') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{$datas['surname']}}" required autocomplete="surname" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$datas['email']}}" required autocomplete="email" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Stanowisko') }}</label>

                            <div class="col-md-6">

                              <select id="stanowisko" type="number" class="form-control @error('stanowisko') is-invalid @enderror" name="stanowisko" value="{{$datas['id_stanowiska']}}" required autocomplete="stanowisko" autofocus>
                                @foreach($users as $user)
                                <option {{(isset($datas[0]['id_stanowiska'])&& $datas['id_stanowiska']==$user->id)?'selected':''}} value='{{$user->id}}'>{{$user->stanowisko}}</option>
                                @endforeach
                              </select>
                                @error('stanowisko')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edytuj') }}
                                </button>


                            </div>
                        </div>
                    </form>
                    @endcan
                    @can('isMngr')
                      <form method="POST" action="/users/edit/{{$datas[0]['id']}}">
                          @csrf

                          <div class="row mb-3">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Imię') }}</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$datas['name']}}" required autocomplete="name" autofocus>

                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nazwisko') }}</label>

                              <div class="col-md-6">
                                  <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{$datas['surname']}}" required autocomplete="surname" autofocus>

                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$datas['email']}}" required autocomplete="email" autofocus>

                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Stanowisko') }}</label>

                              <div class="col-md-6">

                                <select id="stanowisko" type="number" class="form-control @error('stanowisko') is-invalid @enderror" name="stanowisko" value="{{$datas['id_stanowiska']}}" required autocomplete="stanowisko" autofocus>
                                  @foreach($users as $user)
                                  <option {{(isset($datas[0]['id_stanowiska'])&& $datas[0]['id_stanowiska']==$user->id)?'selected':''}} value='{{$user->id}}'>{{$user->stanowisko}}</option>
                                  @endforeach
                                </select>
                                  @error('stanowisko')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Edytuj') }}
                                  </button>


                              </div>
                          </div>
                      </form>
                      @endcan
                      @can('isWrkr')
                        {{ __('Brak dostępu do zawartości!') }}
                      @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
