@extends('layouts.admin.panel', ['content_card' => false])

@section('title', 'Validate Registrar')

@section('content')
    <x-registrar.form-validate :registrar="$registrar" :index="route('admin.registrar.index')"></x-registrar.form-validate>
@endsection
