@extends('layouts.layout')
 
@section('title', 'Create')
 
@section('content')


<a href="{{ route('notas.index') }}" class="btn btn-secondary m-5">Ver Notas</a>
<h2 class="m-5">Notas</h2>

<div class="m-5">
    <form action="{{ route('notas.store') }}" method="POST">
        @csrf
        <div class="mb-3 row">
            <label for="nombre" class="col-sm-3 col-form-label">Nombres</label>
            <div class="col-sm-6">
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre">
                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="parcial1" class="col-sm-3 col-form-label">Parcial 1</label>
            <div class="col-sm-6">
                <input type="text" class="form-control @error('parcial1') is-invalid @enderror" id="parcial1" name="parcial1">
                @error('parcial1')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="parcial2" class="col-sm-3 col-form-label">Parcial 2</label>
            <div class="col-sm-6">
                <input type="text" class="form-control @error('parcial2') is-invalid @enderror" id="parcial2" name="parcial2">
                @error('parcial2')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="parcial3" class="col-sm-3 col-form-label">Parcial 3</label>
            <div class="col-sm-6">
                <input type="text" class="form-control @error('parcial3') is-invalid @enderror" id="parcial3" name="parcial3">
                @error('parcial3')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-success">Registrar</button>
            </div>
        </div>
    </form>
</div>


@endsection