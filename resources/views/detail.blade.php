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

<style>
    h1{
        font-family: sans-serif;
    }
    
    table {
        font-family: Arial, Helvetica, sans-serif;
        color: #666;
        text-shadow: 1px 1px 0px #fff;
        background: #eaebec;
        border: #ccc 1px solid;
    }
    
    table th {
        padding: 15px 35px;
        border-left:1px solid #e0e0e0;
        border-bottom: 1px solid #e0e0e0;
        background: #ededed;
    }
    
    table th:first-child{  
        border-left:none;  
    }
    
    table tr {
        text-align: center;
        padding-left: 20px;
    }
    
    table td:first-child {
        text-align: left;
        padding-left: 20px;
        border-left: 0;
    }
    
    table td {
        padding: 15px 35px;
        border-top: 1px solid #ffffff;
        border-bottom: 1px solid #e0e0e0;
        border-left: 1px solid #e0e0e0;
        background: #fafafa;
        background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
        background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
    }
    
    table tr:last-child td {
        border-bottom: 0;
    }
    
    table tr:last-child td:first-child {
        -moz-border-radius-bottomleft: 3px;
        -webkit-border-bottom-left-radius: 3px;
        border-bottom-left-radius: 3px;
    }
    
    table tr:last-child td:last-child {
        -moz-border-radius-bottomright: 3px;
        -webkit-border-bottom-right-radius: 3px;
        border-bottom-right-radius: 3px;
    }
    
    table tr:hover td {
        background: #f2f2f2;
        background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
        background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
    }
</style>
