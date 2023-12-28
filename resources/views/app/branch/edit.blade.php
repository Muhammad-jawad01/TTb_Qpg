@extends('layout.master')

@section('title', 'Edit Branch')


@section('content')
    <livewire:branch.form :model=$model type='update' />

@endsection
