@extends('layouts.app') {{-- Usa tu layout base --}}

@section('title', 'Dashboard')

@section('content')

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Especialidades</h5>
                        <p class="card-text">Gestión de especialidades médicas registradas en el sistema.</p>
                        <a href="{{ route('especialidades.index') }}" class="btn btn-primary">Ir al módulo</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Medicos</h5>
                        <p class="card-text">Gestión de médicos registradas en el sistema.</p>
                        {{-- <a href="{{ route('especialidades.index') }}" class="btn btn-primary">Ir al módulo</a> --}}
                        <a href="{{ url('/medicos') }}" class="btn btn-primary">Ir al módulo</a>
                    </div>
                </div>
            </div>


            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Personas</h5>
                        <p class="card-text">Gestión de personas registradas en el sistema.</p>
                        {{-- <a href="{{ route('especialidades.index') }}" class="btn btn-primary">Ir al módulo</a> --}}
                        <a href="{{ url('/personas') }}" class="btn btn-primary">Ir al módulo</a>
                    </div>
                </div>
            </div>

            {{-- Aquí puedes agregar más cards en el futuro sin que se deforme el diseño --}}


        </div>
    </div>

@endsection



{{--
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
--}}
