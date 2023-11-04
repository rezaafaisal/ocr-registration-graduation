@extends('layouts.operator.faculty.panel', ['content_card' => false])

@section('title', __('list of student'))

@section('content')
    <x-student.index :checkbox="false" :action="false" :create="route('operator.faculty.student.create')" :edit="function ($item) {
        return route('operator.faculty.student.edit', ['student' => $item]);
    }"></x-student.index>
@endsection