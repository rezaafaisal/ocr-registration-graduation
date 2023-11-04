@extends('layouts.operator.faculty.panel', ['content_card' => false])

@section('title', 'Validating Registrar')

@section('content')
    <x-registrar.form-validate :registrar="$registrar" :index="route('operator.faculty.registrar.validate')">
    </x-registrar.form-validate>
@endsection
