
@extends('Mobile.layouts.app')
@section('content')
    @livewire('mobile.user-edit', ['id' => $id])
@endsection
