@extends('layouts.operator.faculty.panel', ['content_card' => false])

@section('title', 'Registrar')

@section('content')
    <x-registrar.table :validate="function ($item) {
        return route('operator.faculty.registrar.validate', ['registrar' => $item]);
    }"></x-registrar.table>
@endsection
