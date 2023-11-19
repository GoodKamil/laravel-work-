@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container mb-4 mt-4 p-0">
            <h4>Pracownik: {{$user->name . ' '.$user->surname}} </h4>
        </div>
        <table class="table" id="DataTable">
            <thead>
            <tr>
                <th scope="col">LP.</th>
                <th scope="col">Data</th>
                <th scope="col">Ilość godzin</th>
                <th scope="col">Opis</th>
                <th scope="col">Data dodania</th>
                <th scope="col">Akcja</th>
            </tr>
            </thead>
            <tbody>
            @foreach($workingTimesUser as $workingTimeUser)
                <tr id="dtable-{{$workingTimeUser->id}}">
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$workingTimeUser->dzien}}</td>
                    <td>{{$workingTimeUser->godziny}}</td>
                    <td>{{$workingTimeUser->opis}}</td>
                    <td>{{$workingTimeUser->created_at ?? '-'}}</td>
                    <td>
                        <a  href="{{route('workingTimeUser.edit',[$workingTimeUser->id])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                        @can('isBoss')
                        <a  href="#" data-method="delete" data-value="{{$workingTimeUser->id}}"><i class="fa-solid fa-trash"></i></a>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('workingTime.index')}}"><button type="button" class="btn btn-secondary">Powrót</button></a>
    </div>
    @vite(['resources/js/delete.js','resources/js/datatTable-script.js'])
    <script>
        const mURL = "{{url('deleteTimeWorkingUser')}}";
        const TITLE='Czy na pewno chcesz usunąć informację o czasie pracy pracownika?'
    </script>
@endsection
