@extends('layouts.lecturer_dashboard')

@section('content')
    <livewire:lecturer.student-transcript :student="$student" />
@endsection
