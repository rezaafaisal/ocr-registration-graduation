@extends('layouts.operator.faculty.panel', ['content_card' => false])

@section('title', 'Validate Registrar')

@section('content')
    <x-registrar.form-validate :registrar="$registrar" :index="route('operator.faculty.registrar.index')"></x-registrar.form-validate>
@endsection
