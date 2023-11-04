@extends('layouts.admin.panel', ['content_card' => false])

@section('title', __('list of student'))

@section('content')
    <x-student.index :create="route('admin.student.create')" :edit="function ($item) {
        return route('admin.student.edit', ['student' => $item]);
    }"></x-student.index>
@endsection