@extends('layouts.dashboard')

@section('content')

<livewire:course-list>

@endsection

@section('script')

    <script>
        window.addEventListener('close-modal', event => {
            $('#AddSemistercourse').modal('hide');
            // $('#editCondition').modal('hide');
            // $('#DeleteConditionModal').modal('hide');
        })
    </script>

@endsection
