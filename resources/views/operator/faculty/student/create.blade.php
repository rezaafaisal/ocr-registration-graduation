@extends('layouts.operator.faculty.panel', ['content_card' => false])

@section('title', __('create student'))

@section('content')
    <x-student.create :index="route('operator.faculty.student.index')" :password="$password"></x-student.create>
@endsection
