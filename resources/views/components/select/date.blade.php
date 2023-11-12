@props(['classContainer'=>'row mb-3','classDiv'=>'col-md-6'])
<div class="{{$classContainer}}">
    <label for="miesiac" class="col-md-4 col-form-label text-md-right">{{ __('Miesiąc') }}</label>
    <div class="{{$classDiv}}">
        <select id="miesiac"  class="form-control @error('miesiac') is-invalid @enderror" name="miesiac" >
            <option @selected(old('miesiac')=='0') value='0'>Każdy</option>
            <option @selected(old('miesiac')=='1') value='1'>Styczeń</option>
            <option @selected(old('miesiac')=='2') value='2'>Luty</option>
            <option @selected(old('miesiac')=='3') value='3'>Marzec</option>
            <option @selected(old('miesiac')=='4') value='4'>Kwiecień</option>
            <option @selected(old('miesiac')=='5') value='5'>Maj</option>
            <option @selected(old('miesiac')=='6') value='6'>Czerwiec</option>
            <option @selected(old('miesiac')=='7') value='7'>Lipiec</option>
            <option @selected(old('miesiac')=='8') value='8'>Sierpień</option>
            <option @selected(old('miesiac')=='9') value='9'>Wrzesień</option>
            <option @selected(old('miesiac')=='10') value='10'>Październik</option>
            <option @selected(old('miesiac')=='11') value='11'>Listopad</option>
            <option @selected(old('miesiac')=='12') value='12'>Grudzień</option>
        </select>
        <x-error.validator_error name="miesiac" :message="$message ?? '' "></x-error.validator_error>
    </div>
</div>
<div class="{{$classContainer}}">
    <label for="rok" class="col-md-4 col-form-label text-md-right">{{ __('Rok') }}</label>
    <div class="{{$classDiv}}">
        <select id="rok" type="number" class="form-control @error('rok') is-invalid @enderror" name="rok">
            <option @selected(old('rok')=='0') value='0'>Każdy</option>
            <option @selected(old('rok')=='2018') value='2018'>2018</option>
            <option @selected(old('rok')=='2019') value='2019'>2019</option>
            <option @selected(old('rok')=='2020') value='2020'>2020</option>
            <option @selected(old('rok')=='2021') value='2021'>2021</option>
            <option @selected(old('rok')=='2022') value='2022'>2022</option>
            <option @selected(old('rok')=='2023') value='2023'>2023</option>
        </select>
        <x-error.validator_error name="rok" :message="$message ?? ''"></x-error.validator_error>
    </div>
</div>
