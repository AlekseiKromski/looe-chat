@extends('layout.layout_looe')
@section('content')
    <div id="app">
        <chat-component username="@if(!empty(Auth::user()->username)){{Auth::user()->username}}@else{{Auth::user()->login}}@endif" userid="{{Auth::id()}}"></chat-component>
    </div>
@endsection
