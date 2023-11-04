@extends('layouts.admin.panel', ['content_card' => false])

@section('title', __('create registration quota'))

@section('content')
    <x-quota.create :index="route('admin.quota.index')"></x-quota.create>
@endsection
