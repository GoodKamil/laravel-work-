@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="text-end mb-4 mt-3">
            <a href="{{route('position.store')}}"><button class="btn btn-primary">Dodaj stanowisko</button></a>
        </div>
        <table class="table" id="DataTable">
            <thead>
            <tr>
                <th scope="col">LP.</th>
                <th scope="col">Stanowisko</th>
                <th scope="col">Uprawnienie</th>
                <th scope="col">Chemia</th>
                <th scope="col">Hałas</th>
                <th scope="col">Inne</th>
                <th scope="col">Akcja</th>
            </tr>
            </thead>
            <tbody>
            @foreach($positions as $position)
                <tr id="dtable-{{$position->id}}">
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$position->stanowisko}}</td>
                    <td>{{$position->poziom_dostepu}}</td>
                    <td>{{$position->chemia ? 'Tak' : 'Nie'}}</td>
                    <td>{{$position->halas ? 'Tak' : 'Nie'}}</td>
                    <td>{{$position->inne ? 'Tak' : 'Nie'}}</td>
                    <td>
                        <a  href="{{route('position.edit',[$position->id])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a  href="#" data-method="delete" data-value="{{$position->id}}"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @vite(['resources/js/delete.js','resources/js/datatTable-script.js'])
    <script>
        const mURL = "{{url('deletePosition')}}";
        const TITLE='Czy na pewno chcesz usunąć stanowisko?'
    </script>
@endsection
