 @extends('layout.header')
 @section('title', 'About Blade')
 @section('main')
    <h1>About</h1>
    <x-message type="error" message="Here is some error" :page=$page/>
 @endsection
 