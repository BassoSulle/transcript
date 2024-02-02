@extends('layouts.dashboard')

@section('content')
    <livewire:add-course-semister-modules :course="$course" />
@endsection
