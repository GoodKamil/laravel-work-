<?php

namespace App\Http\Requests\Time;

use Illuminate\Foundation\Http\FormRequest;

class TimeReuqest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            'id_pracownika'=>'required|numeric|exists:users,id',
            'dzien'=>'date|before_or_equal:'.date('Y-m-d'),
            'godziny'=>'required|numeric|min:1|max:12',
            'opis'=>'required'
        ];
    }

    public function messages():array
    {
        return [
            'id_pracownika.numeric'=>'Wystąpił problem przy wybieraniu pracownika',
            'id_pracownika.required'=>'Proszę wybrać pracownika',
            'id_pracownika.exists'=>'Nie znaleziono wybranego pracownika',
            'dzien.date'=>'Proszę wybrać datę',
            'dzien.before_or_equal'=>'data nie może być większa od daty dzisiejszej',
            'godziny.required'=>'Proszę podać liczbę godzin',
            'godziny.numeric'=>'Nieprawidłowa wartość godzin',
            'godziny.min'=>'Minimalna ilość godzin: 1',
            'godziny.max'=>'Maksymalna ilość godzin: 12',
            'opis.required'=>'Proszę podać opis',
        ];
    }
}
