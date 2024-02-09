<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body p-3" style="min-height: 80vh;">
                <div class="px-2" style="border: 2px double #464646; min-height: 80vh;">
                    <div class="row pt-3">
                        <div class="col-md-2">
                            <center>
                                <img src="{{ asset('assets/img/dit-logo.png') }}" alt="Institute logo"
                                    style="width: 120px; ">
                            </center>
                        </div>
                        <div class="col-md-9 text-center mt-4">
                            <h4 style="font-size: 18px; font-weight: 700;">DAR ES SALAAM INSTITUTE OF
                                TECHNOLOGY</h4>
                            <h4 class="mt-4" style="font-size: 18px; font-weight: 700;">ACADEMIC TRANSCRIPT</h1>
                        </div>
                    </div>
                    <div class="row justify-content-end end-0 mt-4">
                        <div class="col-md-6">
                            <div class="row">
                                <span class="col-4 fw-bold">BIRTHDATE</span>
                                <span class="col-4 fw-bold">GENDER</span>
                                <span class="col-4 fw-bold">REG. NO.</span>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end end-0 mt-3">
                        <div class="col-md-6">
                            @php
                                $birth_date_str = $student->dob; // date of birth stored as a string
                                // create a DateTime object from the string
                                $birth_date = date_create_from_format('Y-m-d', $birth_date_str);
                                // format the date as "dd Month YYYY"
                                $formatted_birth_date = $birth_date->format('F d, Y');
                            @endphp
                            <div class="row">
                                <span class="col-4">{{ $formatted_birth_date }}</span>
                                <span class="col-4 text-uppercase">{{ $student->gender }}</span>
                                <span class="col-4">{{ $student->registration_no }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row ms-2 mt-4">
                        <div class="col-md-5 d-flex">
                            <span class="me-5 fw-bold">DATE OF ADMISSION:</span>
                            <span class="ms-4">{{ $student->created_at->format('F d, Y') }}</span>
                        </div>
                        <div class="col-md-6 d-flex ms-5">
                            <span class="ms-5 me-3 fw-bold">DATE OF GRADUATION:</span>
                            <span
                                class="ms-3">{{ $student->created_at->modify('+' . $student->course->duration . ' years')->format('F d, Y') }}</span>
                        </div>
                    </div>
                    <div class="row ms-2 mt-4">
                        <div class="col-md-12 d-flex">
                            <span class="me-5 fw-bold">AWARD TITLE:</span>
                            <span class="ms-4">
                                <span class="ms-5">
                                    <span class="ms-2 text-uppercase" style="font-size:">
                                        {{ $student->course->name ?? '' }}
                                    </span>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="row ms-2 mt-4">
                        <div class="col-md-6 d-flex">
                            <span class="me-3 fw-bold">CLASSIFICATION OF AWARD:</span>
                            <span class="me-5 text-uppercase">{{ $award_class->name ?? '' }}</span>
                        </div>
                    </div>
                    <div class="row ms-2 mt-4">
                        <div class="col-md-6 d-flex">
                            <span class="me-4 fw-bold">OVERALL GPA:</span>
                            <span class="me-5 ms-5">
                                <span class="ms-5">
                                    <span class="ms-2">
                                        {{ $overall_gpa }}
                                    </span>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="row justify-content-end end-0 mb-3">
                        <div class="col-md-2">
                            <center>
                                <span class="fw-bold" style="font-size: 10px;">SCAN TO VERIFY</span><br>
                                <img src="{{ asset('assets/img/qr-code.png') }}" alt="Institute logo"
                                    style="width: 100px; "><br>
                                <span class="fw-bold" style="font-size: 10px;">SOMA DIT</span>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body p-3">
                <div class="px-3 py-3" style="min-height: ">
                    <div class="row mb-2 mt-1">
                        <div class="col-md-6 text-center">
                            <span class="fw-bold">NAME:</span>
                            <span class="ms-2 text-uppercase">{{ $student->first_name }}
                                {{ $student->middle_name }}
                                {{ $student->surname }}</span>
                        </div>
                        <div class="col-md-6">
                            <span class="fw-bold">COURSE:</span>
                            <span class="ms-2 text-uppercase">{{ $student->course->name }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        @php
                            $i = 0;
                        @endphp
                        @for ($r = 1; $r <= count($semister_results); $r++)

                            {{-- @foreach ($student_semister_modules as $semister) --}}
                            {{-- {{ dd($semister_results[$r]) }} --}}
                            @if (count($semister_results[$r]) != 0)
                                <div class="col-md-6">
                                    <table class="table table-bordered border-none mt-2">
                                        <thead>
                                            <tr>
                                                <td class="fw-bold text-white"
                                                    style="background: #7d7b7b; font-size: 14px;" colspan="3">
                                                    SEMISTER {{ $r }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col" style="font-size: 13px; background: #ccc;">
                                                    CODE
                                                </th>
                                                <th scope="col" style="font-size: 13px; background: #ccc;">
                                                    MODULE
                                                    NAME
                                                </th>
                                                <th scope="col" class="text-center"
                                                    style="font-size: 13px; background: #ccc;">
                                                    GRADE
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($semister_results[$r] as $result)
                                                <tr>
                                                    <td style="font-size: 12px;">{{ $result->module->code }}
                                                    </td>
                                                    <td style="font-size: 12px;">{{ $result->module->name }}
                                                    </td>
                                                    <td style="font-size: 12px;" class="text-center">
                                                        {{ $result->grade->name }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td class="fw-bold" style="background: #ccc; font-size: 13px;"
                                                    colspan="3">
                                                    SEMISTER GPA:<span class="ms-2">{{ $semister_gpa[$r] }}</span>

                                                    <span></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                            {{-- @endforeach --}}
                        @endfor

                    </div>
                    <div class="row justify-content-end end-0 mt-5">
                        <div class="col-md-12">
                            <div class="row justify-content-between text-center">
                                <span class="col-3" style="font-size: 14px;">Department</span>
                                <span class="col-3" style="font-size: 14px;">Head of Department</span>
                                <span class="col-3" style="font-size: 14px;">Register</span>
                                <span class="col-3" style="font-size: 14px;">Date</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row justify-content-between text-center">
                                <span
                                    class="col-3 fw-bold mt-2 text-uppercase">{{ $student->course->department->name }}</span>
                                <span class="col-3 mt-3">
                                    <center>
                                        <hr style="width: 150px;">
                                    </center>
                                </span>
                                <span class="col-3 mt-3">
                                    <center>
                                        <hr style="width: 150px;">
                                    </center>
                                </span>
                                <span class="col-3 mt-3" style="font-size: 14px;">
                                    <center>
                                        {{ now()->format('F d, Y') }}
                                    </center>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row justify-content-between text-center">
                                <span class="col-3 fw-bold" style="font-size: 14px;"></span>
                                <span class="col-3 fw-bold"
                                    style="font-size: 14px;">{{ $hod->first_name . ' ' . $hod->middle_name . ' ' . $hod->surname }}</span>
                                <span class="col-3 fw-bold"
                                    style="font-size: 14px;">{{ $register->first_name . ' ' . $register->middle_name . ' ' . $register->surname }}</span>
                                <span class="col-3 fw-bold" style="font-size: 14px;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
