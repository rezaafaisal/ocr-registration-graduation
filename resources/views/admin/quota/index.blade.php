@extends('layouts.admin.panel', ['content_card' => false])

@section('title', __('quota'))

@section('content')
    <x-quota.index :create="route('admin.quota.create')" :edit="function ($item) {
        return route('admin.quota.edit', ['quota' => $item]);
    }"></x-quota.index>
@endsection
