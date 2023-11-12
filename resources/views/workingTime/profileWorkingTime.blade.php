@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container mb-4 mt-4 p-0">
        <h4>Pracownik: {{auth()->user()->name . ' '.auth()->user()->surname}} </h4>
        </div>
        <table class="table" id="DataTable">
            <thead>
            <tr>
                <th scope="col">LP.</th>
                <th scope="col">Data</th>
                <th scope="col">Ilość godzin</th>
                <th scope="col">Opis</th>
                <th scope="col">Data dodania</th>
                <th scope="col">Data aktualizacji</th>
            </tr>
            </thead>
            <tbody>
            @foreach($workingTimesUser as $workingTimeUser)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$workingTimeUser->dzien}}</td>
                    <td>{{$workingTimeUser->godziny}}</td>
                    <td>{{$workingTimeUser->opis}}</td>
                    <td>{{$workingTimeUser->created_at ?? '-'}}</td>
                    <td>{{$workingTimeUser->updated_at ?? '-'}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @vite(['resources/js/datatTable-script.js'])
@endsection
