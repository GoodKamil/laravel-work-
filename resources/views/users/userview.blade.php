@extends('layouts.app')

@section('content')
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">imie</th>
      <th scope="col">nazwisko</th>
      <th scope="col">email</th>
    </tr>
  </thead>
  <tbody>
@foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->surname}}</td>
      <td>{{$user->email}}</td>
    </tr>
@endforeach
  </tbody>
</table>
</div>
@endsection
