@extends('layouts.admin.panel', ['content_card' => false])

@section('title', 'Create Registrar')

@section('content')
    <x-registrar.form-create :index="route('admin.registrar.index')"></x-registrar.form-create>
@endsection
