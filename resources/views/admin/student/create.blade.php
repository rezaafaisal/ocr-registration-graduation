@extends('layouts.admin.panel', ['content_card' => false])

@section('title', __('create student'))

@section('content')
    <x-student.create :index="route('admin.student.index')"></x-student.create>
@endsection
