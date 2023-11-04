@extends('layouts.operator.academic.panel', ['content_card' => false])

@section('title', 'Registrar')

@section('content')
    <x-registrar.table :state="'validate'" :columns="['name', 'nim', 'faculty', 'study_program', 'ipk']" :validate="function ($item) {
        return route('operator.academic.registrar.validate_validate', ['registrar' => $item]);
    }"></x-registrar.table>
@endsection
