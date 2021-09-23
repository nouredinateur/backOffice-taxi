@extends('layouts.dashboard')
@section('content')

@role('admin')
    I have Admin permissions
@endrole

@role('mod')
    I have Mod permissions
@endrole

@role('user')
    I have User permissions
@endrole

@endsection