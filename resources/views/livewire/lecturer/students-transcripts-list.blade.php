<div>
    <div class="pagetitle">
        <div class="row">
            <div class="col">
                <h1>Students Transcripts</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('lecturer.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Students Transcripts</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Primary Color Bordered Table -->
    <table class="table table-bordered border-primary mt-2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Full name</th>
                <th scope="col">Reg.No.</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Course</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $a = 1;
            @endphp
            @forelse ($students as $student)
                <tr>
                    <th scope="row">{{ $a++ }}</th>
                    <td>
                        {{ $student->first_name }} {{ $student->middle_name }}
                        {{ $student->surname }}
                    </td>
                    <td>{{ $student->registration_no }}</td>
                    <td>{{ $student->email ?? 'None' }}</td>
                    <td>{{ $student->gender ?? 'None' }}</td>
                    @php
                        $date = new DateTime($student->dob);
                        $formatted_date = $date->format('M d, Y');
                    @endphp
                    <td>{{ $formatted_date ?? 'None' }}</td>
                    <td>{{ $student->course->name ?? 'None' }}</td>
                    <td>
                        <button class="btn btn-success text-white"
                            wire:click="checkStudentResults({{ $student->registration_no }})"
                            title="View Transcript"><i class="bi bi-file-text"></i></button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">No student found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $students->links() }}
</div>
