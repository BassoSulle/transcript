@extends('layout.dashboard')

@section('content')
<livewire:department-list>

@endsection

@section('script')

    <script>
        window.addEventListener('close-modal', event => {
            $('#AddDepartmentModel').modal('hide');
            // $('#editCondition').modal('hide');
            // $('#DeleteConditionModal').modal('hide');
        })
    </script>

@endsection
