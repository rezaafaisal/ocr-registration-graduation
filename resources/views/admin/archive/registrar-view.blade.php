@extends('layouts.admin.panel', ['content_card' => false])

@section('title', 'Archive Registrar')

@section('content')
    <x-archive-registrar.view :registrar="$registrar"></x-archive-registrar.view>
@endsection
