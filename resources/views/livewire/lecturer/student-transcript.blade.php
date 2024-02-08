<div>
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
                                <h4 style="font-size: 18px;">DAR ES SALAAM INSTITUTE OF
                                    TECHNOLOGY</h4>
                                <h4 style="font-size: 18px;">ACADEMIC TRANSCRIPT</h1>
                            </div>
                        </div>
                        <div class="row justify-content-end end-0 mt-3">
                            <div class="col-md-6 d-flex">
                                <span class="me-5 fw-bold">BIRTHDATE</span>
                                <span class="me-5 fw-bold">GENDER</span>
                                <span class="me-5 fw-bold">REG. NO.</span>
                            </div>
                        </div>
                        <div class="row justify-content-end end-0 mt-3">
                            <div class="col-md-6 d-flex">
                                <span class="me-5">{{ $student->dob }}</span>
                                <span class="ms-2 me-5 text-uppercase">{{ $student->gender }}</span>
                                <span class="ms-4">{{ $student->registration_no }}</span>
                            </div>
                        </div>
                        <div class="row ms-2 mt-4">
                            <div class="col-md-5 d-flex">
                                <span class="me-5 fw-bold">DATE OF ADMISSION:</span>
                                <span class="ms-4">{{ $student->created_at->format('M d, Y') }}</span>
                            </div>
                            <div class="col-md-6 d-flex ms-5">
                                <span class="ms-5 me-2 fw-bold">DATE OF GRADUATION:</span>
                                <span class="ms-5">2/12/2022</span>
                            </div>
                        </div>
                        <div class="row ms-2 mt-4">
                            <div class="col-md-6 d-flex">
                                <span class="me-5 fw-bold">AWARD TITLE:</span>
                                <span class="me-0 ms-4">
                                    <span class="ms-5">
                                        <span class="ms-2">
                                            2/12/2022
                                        </span>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="row ms-2 mt-4">
                            <div class="col-md-6 d-flex">
                                <span class="me-3 fw-bold">CLASSIFICATION OF AWARD:</span>
                                <span class="me-5">2/12/2022</span>
                            </div>
                        </div>
                        <div class="row ms-2 mt-4">
                            <div class="col-md-6 d-flex">
                                <span class="me-4 fw-bold">OVERALL GPA:</span>
                                <span class="me-5">4.6</span>
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
                    <div class="px-3 py-3" style="min-height: 90vh;">
                        <div class="row">
                            <div class="col-md-4">
                                <table class="table table-bordered border-primary mt-2">
                                    <thead>
                                        <tr>
                                            <td class="fw-bold" style="background: #ccc;" colspan="3">SEMISTER 1</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">CODE</th>
                                            <th scope="col">MODULE NAME</th>
                                            <th scope="col">GRADE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold" style="background: #ccc;" colspan="3">SEMISTER GPA:
                                                <span></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
