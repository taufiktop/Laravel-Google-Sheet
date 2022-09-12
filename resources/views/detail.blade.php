<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.modal')
@extends('layouts.master')
@section('title')
@section('content')
<h1> Detail Unit </h1>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Brand</th>
            <th>Type</th>
            <th>Year</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>
            <td>{{ $d['Id'] }}</td>
            <td>{{ $d['Brand'] }}</td>
            <td>{{ $d['Type'] }}</td>
            <td>{{ $d['Year'] }}</td>
            <td>{{ $d['Price'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
</html>
