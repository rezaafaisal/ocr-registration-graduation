@extends('layouts.operator.academic.panel', ['content_card' => false])

@section('title', __('create student'))

@section('content')
    <x-student.create :index="route('operator.academic.student.index')" :password="$password"></x-student.create>
@endsection
