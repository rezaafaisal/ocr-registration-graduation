@extends('layouts.operator.faculty.panel', ['content_card' => false])

@section('title', 'Registrar')

@section('content')
    <x-registrar.table :state="'validate'" :columns="['name', 'nim', 'study_program', 'ipk']" :validate="function ($item) {
        return route('operator.faculty.registrar.validate_validate', ['registrar' => $item]);
    }"></x-registrar.table>
@endsection
