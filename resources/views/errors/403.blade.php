@extends('layouts.app')

@section ('content')
<h1 class="text-center">{{ $exception->getMessage() }}</h1>

@endsection