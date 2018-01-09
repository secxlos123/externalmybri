@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('breadcrumb')
    <h1 class="text-uppercase">Data Verifikasi</h1>
    <ol class="breadcrumb text-center">
        <li><a href="#">Dashboard</a></li>
        <li class="active">Verifikasi</li>
    </ol>
@endsection

@section('content')
<section id="property" class="padding listing1">
    <div class="container">
            <div class="col-md-12 notif">
                <table align="center" bgcolor="#fafafa" width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td height="20px"></td>
                    </tr>
                    <tr>
                        <td align="center">
                            <table align="center" class="table-inner" width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center">
                                        <img align="center" width="200px" src="https://mybri.stagingapps.net/assets/images/logo/Logo-Website.png">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20px"></td>
                                </tr>
                                <tr>
                                    <td align="center">Verifikasi Permohonan Kredit KPR-BRI</td>
                                </tr>
                                <tr>
                                    <td height="20px"></td>
                                </tr>
                                <tr>
                                    <td bgcolor="#F7941E" height="5" align="center"></td>
                                </tr>
                                <tr>
                                    <td height="20px"></td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <span>Hai, {!! $data_verification['name'] !!}!</span>
                                        <br>
                                        <div> Berikut, data permohonan anda: </div>
                                        <br>
                                        <table align="left" width="550" border="0" cellspacing="0" cellpadding="0" class="table-form-verifikasi">
                                            <tr>
                                                <td>No. Ref Aplikasi</td>
                                                <td> : </td>
                                                <td>{!! $data_verification['no_ref'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>NIK </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['nik'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Lengkap </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['name'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['address'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Kota </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['city_id'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>No. Telepon </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['phone'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>No. Handphone </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['mobile_phone'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Gadis Ibu Kandung </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['mother_name'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Tanggal Lahir </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['birth_place_id'].",".$data_verification['birth_date'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Kartu Tanda Penduduk </td>
                                                <td> : </td>
                                                <td>
                                                    <img src="{!! $data_verification['identity'] !!}" width="200" height="100" alt="ktp" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['gender'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Status Pernikahan </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['status'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Status Tempat Tinggal </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['address_status'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Kewarganegaraan </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['citizenship_name']!!}</td>
                                            </tr>

                                            @if ( $data_verification['status_id'] == '2' )
                                                <tr>
                                                    <td align="center">DATA PASANGAN</td>
                                                </tr>
                                                <tr>
                                                    <td>NIK Pasangan </td>
                                                    <td> : </td>
                                                    <td>{!! $data_verification['couple_nik'] !!}</td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Lengkap </td>
                                                    <td> : </td>
                                                    <td>{!! $data_verification['couple_name'] !!}</td>
                                                </tr>
                                                <tr>
                                                    <td>KTP Pasangan </td>
                                                    <td> : </td>
                                                    <td>
                                                        <img src="{!! $data_verification['couple_identity'] !!}" width="200" height="100" alt="ktp_pasangan" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tempat Tanggal Lahir </td>
                                                    <td> : </td>
                                                    <td>{!! $data_verification['couple_birth_place_id'].",".$data_verification['couple_birth_date']  !!}</td>
                                                </tr>
                                            @endif
                                          
                                            <tr>
                                                <td align="center"><strong><br/> DATA PEKERJAAN </strong></td>
                                            </tr>
                                            <tr>
                                                <td>Bidang Pekerjaan </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['job_field_name'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Pekerjaan </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['job_type_name'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Pekerjaan </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['job_name'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Perusahaan </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['company_name'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Jabatan </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['position_name'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Lama Kerja </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['work_duration'] !!} Tahun {!! $data_verification['work_duration_month'] !!} Bulan</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat Kantor </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['office_address'] !!}</td>
                                            </tr>

                                            <tr>
                                                <td align="center"><strong><br> DATA KEUANGAN </strong></td>
                                            </tr>
                                            <tr>
                                                <td>Gaji/Pendapatan </td>
                                                <td> : </td>
                                                <td>Rp. {!! number_format($data_verification['salary'],2) !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Pendapatan Lain </td>
                                                <td> : </td>
                                                <td>Rp. {!! number_format($data_verification['other_salary'],2) !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Angsuran Pinjaman </td>
                                                <td> : </td>
                                                <td>Rp. {!! number_format($data_verification['loan_installment'],2) !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Tanggungan </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['dependent_amount'] !!}</td>
                                            </tr>

                                            @if ($data_verification['status_id'] == '2' )
                                                <tr>
                                                    <td align="center"><strong><br> DATA KEUANGAN PASANGAN </strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Gaji/Pendapatan </td>
                                                    <td> : </td>
                                                    <td>Rp. {!! number_format($data_verification['couple_salary'],2) !!}</td>
                                                </tr>
                                                <tr>
                                                    <td>Pendapatan Lain </td>
                                                    <td> : </td>
                                                    <td>Rp. {!! number_format($data_verification['couple_other_salary'],2) !!}</td>
                                                </tr>
                                                <tr>
                                                    <td>Angsuran Pinjaman </td>
                                                    <td> : </td>
                                                    <td>Rp. {!! number_format($data_verification['couple_loan_installment'],2) !!}</td>
                                                </tr>
                                            @endif

                                            <tr>
                                                <td align="center"><strong><br> DATA KELUARGA/KERABAT TERDEKAT </strong> </td>
                                            </tr>
                                            <tr>
                                                <td>Nama </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['emergency_name'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>No. Handphone </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['emergency_contact'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Hubungan </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['emergency_relation'] !!}</td>
                                            </tr>

                                             <tr>
                                                <td align="center"><strong><br> DATA PENGAJUAN </strong></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis KPR </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['kpr']['status_property_name'] !!}</td>
                                            </tr>
                                            @if ($data_verification['kpr']['status_property'] == '1' )
                                            <tr>
                                                <td>Developer </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['kpr']['developer_name'] !!}</td>
                                            </tr>
                                                @if ($data_verification['kpr']['developer_name'] != 'Non Kerja Sama')
                                                <tr>
                                                    <td>Nama Proyek </td>
                                                    <td> : </td>
                                                    <td>{!! $data_verification['kpr']['property_name'] !!}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tipe Properti </td>
                                                    <td> : </td>
                                                    <td>{!! $data_verification['kpr']['property_type_name'] !!}</td>
                                                </tr>
                                                <tr>
                                                    <td>Unit Properti </td>
                                                    <td> : </td>
                                                    <td>{!! $data_verification['kpr']['property_item_name'] !!}</td>
                                                </tr>
                                                @endif
                                            @else

                                            <tr>
                                                <td>Jenis Properti </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['kpr']['kpr_type_property_name'] !!}</td>
                                            </tr>

                                            @endif
                                            <tr>
                                                <td>Harga Rumah </td>
                                                <td> : </td>
                                                <td>Rp. {!! number_format($data_verification['kpr']['price'],2) !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Luas Bangunan </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['kpr']['building_area'] !!} m<sup>2</sup></td>
                                            </tr>
                                            <tr>
                                                <td>Lokasi Rumah </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['kpr']['home_location'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Jangka Waktu </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['kpr']['year'] !!} Bulan</td>
                                            </tr>
                                            <tr>
                                                <td>KPR Aktif ke </td>
                                                <td> : </td>
                                                <td>{!! $data_verification['kpr']['active_kpr'] == 3 ? '> 2' : $data_verification['kpr']['active_kpr'] !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Uang Muka </td>
                                                <td> : </td>
                                                <td>Rp. {!! number_format($data_verification['kpr']['down_payment'],2) !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Permohonan </td>
                                                <td> : </td>
                                                <td>Rp. {!! number_format($data_verification['kpr']['request_amount'],2) !!}</td>
                                            </tr>


                                            <tr>
                                                <td height="20px"></td>
                                            </tr>
                                        </table>
                                        <br>
                                        <table align="left" width="550" border="0" cellspacing="0" cellpadding="0" class="warning-notes">
                                            <tr>
                                                <td>
                                                    <ol>
                                                        <li>
                                                            Dengan ini Saya/ Kami mengajukan KPR BRI dan mengizinkan pihak Bank BRI untuk menggunakan data tersebut diatas untuk kepentingan permohonan kredit.
                                                        </li>
                                                        <li>
                                                            Saya/ Kami menyatakan bahwa semua informasi yang diberikan dalam formulir aplikasi ini adalah sesuai keadaan yang sebenarnya.
                                                        </li>
                                                        <li>
                                                            Saya / Kami memberikan kuasa kepada Bank BRI / pihak yang ditunjuk oleh Bank BRI untuk memeriksa atau mencari informasi lebih jauh dari sumber layak manapun, dan akan memberikan informasi terbaru apabila terdapat perubahan data sehubungan dengan permohonan ini.
                                                        </li>
                                                        <li>
                                                            Bank BRI mempunyai hak untuk menolak untuk menerima permohonan saya/ kami tanpa memberitahukan alasannya.
                                                        </li>
                                                        <li>
                                                            Sehubungan dengan disetujuinya verifikasi permohonan kredit ini, saya/ kami menyatakan akan mentaati segala persyaratan ketentuan yang berlaku di Bank BRI.
                                                        </li>
                                                    </ol>
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="20px"></td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#fafafa">
                            <table class="textbutton" align="center" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <a style="padding: 15px 50px;" class="btn-blue border_radius" href="{!! $data_verification[ 'url' ] !!}/approve">Setuju</a>
                                        </td>
                                        <td width="40"></td>
                                        <td align="center">
                                            <a class="btn-red border_radius" href="{!! $data_verification[ 'url' ] !!}/reject">Tidak Setuju</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#fafafa">
                            <img align="center" width="500" src="https://mybri.stagingapps.net/assets/images/logo/footer.png">
                        </td>
                    </tr>
                </table>
            </div>
        
    </div>
</section>
@endsection

<!-- This is styles for this page -->
@push('styles')
    {!! Html::style('assets/css/jquery.dataTables.min.css') !!}
    {!! Html::style('assets/css/dataTables.bootstrap.min.css') !!}
@endpush
<!-- This is styles for this page end -->

<!-- This is scripts for this page -->
@push('scripts')
    {!! Html::script('assets/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/js/dataTables.bootstrap.js') !!}
    <script type="text/javascript">
        var table = $('#datatable').dataTable({
            processing : true,
            serverSide : true,
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
            language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                data : function(d, settings){

                    var api = new $.fn.dataTable.Api(settings);
                    console.log(api);
                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );
                }
            },
            aoColumns : [
                { data: 'nama_pemohon', name: 'nama_pemohon' },
                { data: 'developer_name', name: 'developer_name' },
                { data: 'property_name', name: 'property_name' },
                { data: 'product', name: 'product' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', bSortable: false },
            ],
        });
    </script>
@endpush