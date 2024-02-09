<div>
    <div class="pagetitle">
        <div class="row">
            <div class="col-8">
                <h1>Students Academic Transcript</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('lecturer.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Students Academic Transcript</li>
                    </ol>
                </nav>
            </div>
            <div class="col-2">
                <a href="#" class="button btn btn-success" style="float: right;"><i
                        class="bi bi-file-earmark-pdf-fill me-2"></i>Download
                    PDF</a>
            </div>
            <div class="col-2">
                <a href="{{ route('lecturer.student.transcripts') }}" class="button btn btn-primary"
                    style="float: right;">Back</a>
            </div>
        </div>
    </div>

    {{-- Included page for preview before exporting --}}
    @include('lecturer.exports.academic_transcript')

</div>
