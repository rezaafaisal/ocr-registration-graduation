@extends('layouts.admin.panel', ['content_card' => false])

@section('title', __('edit quota'))
@section('head')
@endsection

@section('content')
    <x-quota.edit :quota="$quota" :index="route('admin.quota.index')"></x-quota.edit>
@endsection
