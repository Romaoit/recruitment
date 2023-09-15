@extends('layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Phone</td>
          <td>Password</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($contacto as $contactos)
        <tr>
            <td>{{$contactos->id}}</td>
            <td>{{$contactos->name}}</td>
            <td>{{$contactos->email}}</td>
            <td>{{$contactos->phone}}</td>
            <td>{{$contactos->password}}</td>
            <td class="text-center">
                <a href="{{ route('contactos.edit', $contactos->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('contactos.destroy', $contactos->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection