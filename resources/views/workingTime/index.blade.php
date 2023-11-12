@extends('layouts.app')
@section('content')
    <div class="container">
            <form action="{{route('workingTime.index')}}" method="post">
            @csrf
           <div class="row">
            <x-select.date classContainer="col-md-5" classDiv="col"></x-select.date>
            <div class="col-md-2 align-self-end" style="margin-bottom: 22px;">
                   <button type="submit" class="btn btn-primary">
                       {{ __('Pokaż') }}
                   </button>
             </div>
           </div>
        </form>
        <table class="table" id="DataTable">
            <thead>
            <tr>
                <th scope="col">LP.</th>
                <th scope="col">Imie</th>
                <th scope="col">nazwisko</th>
                <th scope="col">Email</th>
                <th scope="col">Godziny</th>
                <th scope="col">Akcja</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->surname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->suma}}</td>
                    <td><a  href="{{route('workingTimeUser.show',[$user->id])}}"><i class="fa-solid fa-eye"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @vite(['resources/js/datatTable-script.js'])
@endsection
