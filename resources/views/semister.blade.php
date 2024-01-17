@extends('layouts.dashboard')

@section('content')
<livewire:semister-list>

@endsection

@section('script')

    <script>
        window.addEventListener('close-modal', event => {
            $('#AddSemistermodel').modal('hide');
            // $('#editCondition').modal('hide');
            // $('#DeleteConditionModal').modal('hide');
        })
    </script>

@endsection
