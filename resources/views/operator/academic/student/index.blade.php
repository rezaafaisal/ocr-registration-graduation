@extends('layouts.operator.academic.panel', ['content_card' => false])

@section('title', __('list of student'))

@section('content')
    <x-student.index :checkbox="false" :action="false" :create="route('operator.academic.student.create')" :edit="function ($item) {
        return route('operator.academic.student.edit', ['student' => $item]);
    }"></x-student.index>
@endsection