@extends('layouts.app')

@section('content')
  <x-header>
    <x-slot name="pretitle">{{ __('Dashboard') }}</x-slot>
    <x-slot name="title">{{ __('Dashboard Dosen') }}</x-slot>
  </x-header>

  <div class="page-body">
    <div class="container-xl">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore optio quos recusandae consequatur nesciunt
        inventore impedit adipisci sapiente facilis nisi.</p>
    </div>
  </div>
@endsection
