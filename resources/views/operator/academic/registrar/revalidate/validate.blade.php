@extends('layouts.operator.academic.panel', ['content_card' => false])

@section('title', 'Validating Registrar')

@section('content')
    <x-registrar.form-validate :registrar="$registrar" :index="route('operator.academic.registrar.revalidate')"></x-registrar.form-validate>
@endsection
