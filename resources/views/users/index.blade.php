@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table" id="DataTable">
            <thead>
            <tr>
                <th scope="col">LP.</th>
                <th scope="col">Imie</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Email</th>
                <th scope="col">Stanowisko</th>
                <th scope="col">Akcja</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr id="dtable-{{$user->id}}">
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->surname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->position->stanowisko}}</td>
                    <td><a href="\users\edit\{{$user->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                        @can('isBoss')
                            <a href="#" data-method="delete" data-value="{{$user->id}}"><i class="fa-solid fa-trash"></i></a>
                        @endcan
                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @vite(['resources/js/delete.js','resources/js/datatTable-script.js'])
    <script>
        const mURL = "{{url('/users/delete')}}";
        const TITLE='Czy na pewno chcesz usunąć pracownika?'
    </script>
@endsection
