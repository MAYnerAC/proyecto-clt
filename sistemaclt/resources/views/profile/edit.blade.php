@extends('layouts.app')

@section('title', 'Perfil de Usuario')

@section('content')
    <div class="container py-4">
        <h3 class="mb-4 text-danger">Gestión del Perfil</h3>

        {{-- Información del Perfil --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-danger text-white">
                Actualizar Información Personal
            </div>
            <div class="card-body">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- Actualizar Contraseña --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-danger text-white">
                Cambiar Contraseña
            </div>
            <div class="card-body">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        {{-- Eliminar Cuenta --}}
        <div class="card shadow-sm">
            <div class="card-header bg-danger text-white">
                Eliminar Cuenta
            </div>
            <div class="card-body">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection
