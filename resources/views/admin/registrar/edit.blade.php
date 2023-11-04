@extends('layouts.admin.panel', ['content_card' => false])

@section('title', 'Edit Registrar')

@section('content')
    <x-registrar.form-edit :registrar="$registrar" :index="route('admin.registrar.index')"></x-registrar.form-edit>
@endsection
