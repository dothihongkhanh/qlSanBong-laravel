<!-- Page Header Start -->
@extends('client.layouts.app')
@section('title', 'Đặt sân thành công')
@section('content')
@if($successMessage)
    <div class="alert alert-success">
        {{ $successMessage }}
    </div>
@endif
@endsection