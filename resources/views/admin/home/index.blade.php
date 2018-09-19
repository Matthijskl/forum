@extends('admin.base')

@section('content')
    <button type="button" class="btn btn-inverse-success btn-fw" onclick="showSuccessToast()">Success</button>
    <button class="btn btn-outline-success" onclick="showSwal('success-message')">Click here!</button>
@endsection