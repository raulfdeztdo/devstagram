@extends('layouts.app')

@section('titulo')
    Principal
@endsection

@section('contenido')
    <x-post-list :posts="$posts" />
@endsection