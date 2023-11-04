@extends('layouts.operator.faculty.panel', ['content_card' => false])

@section('title', 'Registrar')

@section('content')
    <x-registrar.table :state="'validated'" :columns="['name', 'nim', 'study_program', 'ipk']" :validate="function ($item) {
        return route('operator.faculty.registrar.validated_validate', ['registrar' => $item]);
    }"></x-registrar.table>
@endsection
