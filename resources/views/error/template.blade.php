@extends('layouts.home')

@section('error')
    <div class="alert alert-danger" role="alert">
    {{$message}}
    </div>
@endsection