@extends('layouts.dashboard')

@section('content')

<livewire:grade-list>

@endsection

@section('script')

    <script>
        window.addEventListener('close-modal', event => {
            //$('#AddDepartmentModel').modal('hide');
            // $('#editCondition').modal('hide');
            // $('#DeleteConditionModal').modal('hide');
        })
    </script>

@endsection
