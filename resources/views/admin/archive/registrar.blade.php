@extends('layouts.admin.panel', ['content_card' => false])

@section('title', 'Archive Registrar')

@section('content')
    <x-archive-registrar.index :quota="$quota"></x-archive-registrar.index>
@endsection
