<div>
    <div class="pagetitle">
        <div class="row">
            <div class="col">
                <h1>Your Modules</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('lecturer.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Your Modules</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Primary Color Bordered Table -->
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Module Code</th>
                <th scope="col">Module Name</th>
                <th scope="col">Credit</th>
                <th scope="col">Semister</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @forelse ($modules as $module)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $module->module->code }}</td>
                    <td>{{ $module->module->name }}</td>
                    <td>{{ $module->module->credit }}</td>
                    <td>{{ $module->semister->name ?? 'None' }}</td>
                </tr>
            @empty
                <td colspan="9" class="text-center">No module found.</td>
            @endforelse

        </tbody>
    </table>
    <!-- End Primary Color Bordered Table -->
</div>
