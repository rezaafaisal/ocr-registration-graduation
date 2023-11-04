@extends('layouts.admin.panel', ['content_card' => false])

@section('title', 'List of Registrar')

@section('content')
    <x-registrar.table :index="route('admin.registrar.index')" :create="route('admin.registrar.create')" :edit="function ($item) {
        return route('admin.registrar.edit', ['registrar' => $item]);
    }" :validate="function ($item) {
        return route('admin.registrar.validate', ['registrar' => $item]);
    }"></x-registrar.table>
@endsection
