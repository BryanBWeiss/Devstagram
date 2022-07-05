@extends('layout.app')

@section('titulo')
Pagina Principal
@endsection

@section('inicio')
Devstagram
@endsection

@section('contenido')

<x-listar-post :posts="$posts"/>

@endsection