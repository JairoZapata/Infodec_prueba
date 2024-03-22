@extends('layouts.layout')
 
@section('title', 'Index')
 
@section('content')

<h1 class="mt-5">Notas</h1>

<a href="{{ route('notas.create') }}" class="btn btn-success">Nuevo</a>

<table class="table table-bordered mt-2">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombres</th>
        <th scope="col">Parcial 1</th>
        <th scope="col">Parcial 2</th>
        <th scope="col">Parcial 3</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach($notas as $nota)
        <tr>
            <th scope="row">{{ $nota->id }}</th>
            <td>{{ $nota->nombre }}</td>
            <td>{{ $nota->parcial_1 }}</td>
            <td>{{ $nota->parcial_2 }}</td>
            <td>{{ $nota->parcial_3 }}</td>
            <td>
              <a href="{{ route('notas.destroy', $nota->id) }}" class="btn btn-secondary">Eliminar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection