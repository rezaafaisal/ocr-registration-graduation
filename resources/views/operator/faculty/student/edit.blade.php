@extends('layouts.operator.faculty.panel', ['content_card' => false])

@section('title', __('edit student'))
@section('head')
@endsection

@section('content')
    <x-student.edit :student="$student" :index="route('operator.faculty.student.index')"></x-student.edit>
@endsection
