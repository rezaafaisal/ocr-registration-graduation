@extends('layouts.admin.panel', ['content_card' => false])

@section('title', 'Archive Quota')

@section('content')
    <x-archive-quota.index :deleteAny="''"></x-archive-quota.index>
@endsection
