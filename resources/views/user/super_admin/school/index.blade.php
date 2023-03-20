@extends('layouts.super_admin')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
        .fs-16 {
            font-size: 16px !important;
        }

        .fs-18 {
            font-size: 18px !important;
        }

        .fs-20 {
            font-size: 20px !important;
        }
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-lg-4 col-md-12 col-sm-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31">
                                <i class="bx bx-search"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Search..." aria-label="Search..."
                                aria-describedby="basic-addon-search31">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 mt-4">
                <div class="row d-flex align-items-center justify-content-end">
                    <div class="col-lg-5 col-md-8 col-sm-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text" id="basic-addon-search31">
                                        <i class="bx bx-filter"></i>
                                    </span>
                                    <select class="form-select">
                                        <option selected>-- Filter --</option>
                                        <option value="1">Berdasarkan Tipe Sekolah SMA</option>
                                        <option value="2">Berdasarkan Tipe Sekolah SMK</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-auto col-md-auto col-sm-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-outline-success rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#addNewSchoolModal">
                                    Tambah Sekolah Baru
                                </button>
                                <div class="modal fade" id="addNewSchoolModal" tabindex="-1" aria-hidden="true"
                                    style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addNewSchoolModalTitle">Tambah Sekolah Baru</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form-create-new-school">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="select-type-schools" class="form-label">
                                                                Pilih Tipe Sekolah
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <select name="school_type" id="select-type-schools"
                                                                class="form-select">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <hr class="flex-grow-1 mr-3 border-light">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="input-npsn-school" class="form-label">
                                                                    NPSN Sekolah
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="school_npsn" type="text"
                                                                    class="form-control" id="input-npsn-school"
                                                                    placeholder="Masukan NPSN Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="input-address-school" class="form-label">
                                                                    Alamat Sekolah
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="school_address" type="text"
                                                                    class="form-control" id="input-address-school"
                                                                    placeholder="Masukan Alamat Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="input-postal-code-school" class="form-label">
                                                                    Kode Pos
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="school_postal_code" type="text"
                                                                    class="form-control" id="input-postal-code-school"
                                                                    placeholder="Masukan Kode Pos Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="input-name-school" class="form-label">
                                                                    Nama Sekolah
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="school_name" type="text"
                                                                    class="form-control" id="input-name-school"
                                                                    placeholder="Masukan Nama Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="input-telephone-number-school"
                                                                    class="form-label">
                                                                    Nomor Telepon Sekolah
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="school_telp_number" type="text"
                                                                    class="form-control"
                                                                    id="input-telephone-number-school"
                                                                    placeholder="Masukan Nomor Telepon Sekolah Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="input-email-school" class="form-label">
                                                                    Email Sekolah
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="school_email" type="text"
                                                                    class="form-control" id="input-email-school"
                                                                    placeholder="Masukan Email Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="input-confirm-email-school"
                                                                    class="form-label">
                                                                    Konfirmasi Email Sekolah
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    id="input-confirm-email-school"
                                                                    placeholder="Masukan Konfirmasi Email Sekolah"
                                                                    aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">
                                                            Tutup
                                                        </button>
                                                        <button id="btn-save-school" type="submit"
                                                            class="btn btn-primary">
                                                            Simpan
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex align-items-center mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="fs-18">Tipe Sekolah</th>
                                    <th class="fs-18">Nama Sekolah</th>
                                    <th class="fs-18">NPSN</th>
                                    <th class="fs-18">Alamat</th>
                                    <th class="fs-18">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-school-list-body" class="table-border-bottom-0 fs-16">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/JQuery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert/sweetalert2@11.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-loading-overlay/2.1.7/loadingoverlay.min.js"
        integrity="sha512-hktawXAt9BdIaDoaO9DlLp6LYhbHMi5A36LcXQeHgVKUH6kJMOQsAtIw2kmQ9RERDpnSTlafajo6USh9JUXckw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="application/javascript">
        fectAllSchools()
        fetchAllSchoolTypes()

        function fetchAllSchoolTypes()
        {
            $.ajax({
                type: 'GET',
                url: "{{ route('api.super-admin.school-type.index') }}",
                contentType: "application/json",
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 200) {
                        const schoolTypes = response.data.school_types
                        
                        $('#select-type-schools').empty()
                        $('#select-type-schools').append(`<option>-- Pilih Tipe Sekolah --</option>`)
                        schoolTypes.forEach(function (schoolType, index) {
                            $('#select-type-schools').append(`<option value="${schoolType.id}">${schoolType.name}</option>`)
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: response.message
                        })
                    }
                },
                error: function (response) {
                    const responseJson = response.responseJSON

                    Swal.fire({
                        icon: 'error',
                        title: responseJson.message
                    })
                }
            })
        }

        function fectAllSchools()
        {
            $.ajax({
                type: 'GET',
                url: "{{ route('api.super-admin.school.index') }}",
                contentType: "application/json",
                dataType: 'json',
                success: function (response) {
                    if (response.status_code === 200) {
                        const schools = response.data.schools
                        
                        if(schools.length === 0){
                            let htmlTableBody = ''

                            htmlTableBody += `<tr>`
                            htmlTableBody += `<td colspan="5">Data masih kosong</td>`
                            htmlTableBody += `</tr>`

                            $('#table-school-list-body').append(htmlTableBody)
                        }else{
                            $('tbody').html("")
                            let htmlTableBody = ''

                            schools.forEach(function (school, index) {
                                htmlTableBody += `<tr>`
                                htmlTableBody += `<td>${index + 1}</td>`
                                htmlTableBody += `<td>${school.school_type.name}</td>`
                                htmlTableBody += `<td>${school.name}</td>`
                                htmlTableBody += `<td>${school.npsn}</td>`
                                htmlTableBody += `<td>${school.address}</td>`
                                htmlTableBody += `<td>`
                                htmlTableBody += `<div class="dropdown">`
                                htmlTableBody += `<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">`
                                htmlTableBody += `<i class="bx bx-dots-vertical-rounded"></i>`
                                htmlTableBody += `</button>`
                                htmlTableBody += `<div class="dropdown-menu" style="">`
                                htmlTableBody += `<a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>`
                                htmlTableBody += `<a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>`
                                htmlTableBody += `</div>`
                                htmlTableBody += `</div>`
                                htmlTableBody += `</td>`
                                htmlTableBody += `</tr>`
                            })

                            $('#table-school-list-body').append(htmlTableBody)
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: response.message
                        })
                    }
                },
                error: function (response) {
                    const responseJson = response.responseJSON

                    Swal.fire({
                        icon: 'error',
                        title: responseJson.message
                    })
                }
            })
        }

        $('#form-create-new-school').on('submit', function (event) {
            event.preventDefault()
            
            const btnSave = $('#btn-save-school')

            btnSave.attr("disabled", true)
            btnSave.html('Simpan...')

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            
            $.LoadingOverlay("show", {
                image: "",
                fontawesome: "fa fa-spinner fa-spin"
            })

            $.ajax({
                type: 'POST',
                url: "{{ route('api.super-admin.school.store') }}",
                data: $(this).serialize(),
                success: function (response) {
                    if (response.status_code === 201) {
                        $('#addNewSchoolModal').find('input').val('')
                        $('#addNewSchoolModal').modal('hide')
                        Swal.fire({
                            icon: 'success',
                            title: response.message
                        }).then(function(){
                            fectAllSchools()
                        })
                    } else {
                        $('#addNewSchoolModal').modal('hide')
                        Swal.fire({
                            icon: 'error',
                            title: response.message
                        })
                    }
                },
                error: function (response) {
                    const responseJson = response.responseJSON

                    if (response.status === 422) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Validasi Error',
                            text: responseJson.message
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: responseJson.message
                        })
                    }
                },

                complete: function () {
                    $.LoadingOverlay("hide")
                }
            })

            btnSave.html('Simpan')
            btnSave.removeAttr("disabled")
        })
    </script>
@endsection
