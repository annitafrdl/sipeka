<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tahun Bulan</h4>
                            <div class="card-header-action">
                                <button class="btn btn-icon icon-left btn-primary" onclick="add_new_thnbln()"> <i class="fas fa-plus"></i> Tambah </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="list-group" id="list-tab" role="tablist"> </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4><?= $title ?> <span id="judul-tabel"></span></h4>
                            <div class="card-header-action">
                                <button class="btn btn-icon icon-left btn-primary" onclick="add_new()"> <i class="fas fa-plus"></i> Tambah </button>
                                <button class="btn btn-icon icon-left btn-primary" onclick="reload_table()"> <i class="fas fa-sync-alt"></i> Refresh </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center"> No </th>
                                        <th>Minggu</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Kas Masuk</th>
                                        <th>Persentase</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<!-- BEGIN modal -->
<div class="modal fade" id="modal_form_thnbln" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">My Modal</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>

            <form id="form_thnbln" method="post">
                <div class="modal-body m-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="thn_bln"> Tahun Bulan </label>
                                <input type="text" class="form-control" name="thn_bln" id="thn_bln" required autofocus>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
                    <button type="submit" class="btn btn-primary" id="btnSave2">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END modal -->

<!-- BEGIN modal -->
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">My Modal</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>

            <form id="form" method="post">
                <div class="modal-body m-3">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="i_thn_bln" id="i_thn_bln">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="minggu"> Minggu Ke </label>
                                <select name="minggu" id="minggu" class="form-control" required>
                                    <option value="">-- Pilih Minggu --</option>
                                    <option value="1">Minggu 1</option>
                                    <option value="2">Minggu 2</option>
                                    <option value="3">Minggu 3</option>
                                    <option value="4">Minggu 4</option>
                                    <option value="5">Minggu 5</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tgl"> Tanggal </label>
                                <input type="date" class="form-control" name="tgl" id="tgl" required autofocus>
                            </div>
                        </div>
                    </div>

                    <div id="input_jenis" class="row"></div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="persentase_pengelola"> Persentase Pengelola </label>
                                <div class="input-group-prepend">
                                    <input type="number" class="form-control" name="persentase_pengelola" id="persentase_pengelola" required autofocus>
                                    <div class="input-group-text"> % </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="persentase_petugas"> Persentase Petugas </label>
                                <div class="input-group-prepend">
                                    <input type="number" class="form-control" name="persentase_petugas" id="persentase_petugas" required autofocus>
                                    <div class="input-group-text"> % </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pengeluaran"> Pengeluaran </label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"> Rp. </div>
                                    <input type="number" class="form-control" name="pengeluaran" id="pengeluaran">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jumlah"> Jumlah </label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"> Rp. </div>
                                    <input type="number" class="form-control" name="jumlah" id="jumlah" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jumlah_pengelola"> Pengelola </label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"> Rp. </div>
                                    <input type="number" class="form-control" name="jumlah_pengelola" id="jumlah_pengelola" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jumlah_petugas"> Petugas </label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"> Rp. </div>
                                    <input type="number" class="form-control" name="jumlah_petugas" id="jumlah_petugas" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jumlah_bersih"> Jumlah Bersih </label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text"> Rp. </div>
                                    <input type="number" class="form-control" name="jumlah_bersih" id="jumlah_bersih" readonly>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
                    <button type="button" class="btn btn-success" id="hitung">Hitung</button>
                    <button type="submit" class="btn btn-primary" id="btnSave">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END modal -->


<!-- javascript apps -->
<script type="text/javascript">
    var save_method;
    var table, thn_bln;

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax
    }

    function add_new_thnbln() {
        save_method = 'add';
        $('#form_thnbln')[0].reset(); // reset form on modals
        $('#modal_form_thnbln').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Tahun Bulan'); // Set Title to Bootstrap modal title
    }

    function add_new() {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Transaksi ' + thn_bln); // Set Title to Bootstrap modal title
        get_from_jenis_kas();
    }

    function get_from_jenis_kas() {
        $('#input_jenis').empty();
        $.ajax({
            url: "<?php echo base_url($module . 'get_from_jenis_kas') ?>",
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                $('#input_jenis').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function edit(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal when complete loaded

        get_from_jenis_kas();

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo base_url($module . 'ajax_edit/') ?>" + id,
            type: "POST",
            dataType: "JSON",

            success: function(data) {
                $('.modal-title').text('Edit Transaksi ' + thn_bln); // Set title to Bootstrap modal title

                $('[name="id"]').val(data.id_transaksi);
                $('[name="i_thn_bln"]').val(data.thn_bln);
                $('[name="minggu"]').val(data.minggu);
                $('[name="tgl"]').val(data.tgl);
                $('[name="persentase_pengelola"]').val(data.persentase_pengelola);
                $('[name="persentase_petugas"]').val(data.persentase_petugas);
                $('[name="pengeluaran"]').val(data.pengeluaran);
                $('[name="jumlah"]').val(data.jumlah);
                $('[name="jumlah_pengelola"]').val(data.jumlah_pengelola);
                $('[name="jumlah_petugas"]').val(data.jumlah_petugas);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire('Ooppss :(', 'Terjadi kesalahan saat mengambil data.', 'error');
            }
        });
    }

    function hapus(id) {
        Swal.fire({
            title: 'Apa anda yakin ?',
            text: "Data akan dihapus secara permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo base_url($module . 'ajax_delete/') ?>" + id,
                    type: "POST",
                    dataType: "JSON",

                    success: function(data) {
                        if (data.status == '00') {
                            //if success reload ajax table
                            reload_table();
                            Swal.fire('Good job!', data.mess, 'success');
                        } else {
                            Swal.fire('Yaahh...', data.mess, 'error');
                        }

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire('Ooppss :(', 'Kesalahan saat menghapus data', 'error');
                    }
                });
            }
        });
    }

    function hapus_data(id) {
        Swal.fire({
            title: 'Apa anda yakin ?',
            text: "Data akan dihapus secara permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo base_url($module . 'ajax_delete_thnbln/') ?>" + id,
                    type: "POST",
                    dataType: "JSON",

                    success: function(data) {
                        if (data.status == '00') {
                            //if success reload ajax table
                            getList();
                            Swal.fire('Good job!', data.mess, 'success');
                        } else {
                            Swal.fire('Yaahh...', data.mess, 'error');
                        }

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire('Ooppss :(', 'Kesalahan saat menghapus data', 'error');
                    }
                });
            }
        });
    }

    $('#form').submit(function(e) {
        e.preventDefault();
        var form = $('#form')[0];
        var data = new FormData(form);

        if ($('#jumlah').val() == '') {
            Swal.fire('Priit..!', 'Ada yang kelewat. Silahkan klik tombol hitung dulu !', 'warning');
            return false;
        }

        $('#btnSave').text('Sedang Proses, Mohon tunggu...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable
        var url;

        if (save_method == 'add') {
            url = "<?php echo base_url($module . 'ajax_add') ?>";
        } else {
            url = "<?php echo base_url($module . 'ajax_update') ?>";
        }

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            data: data,
            dataType: "JSON",

            success: function(data) {
                console.log(data);

                if (data.status == '00') {
                    //if success reload ajax table
                    getDatatable(thn_bln);
                    Swal.fire('Good job!', data.mess, 'success');
                } else {
                    Swal.fire('Yaahh...', data.mess, 'warning');
                }

                $('#modal_form').modal('hide');
                $('#btnSave').text('Simpan'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire('Ooppss :(', 'Error adding / update data', 'error');
                $('#btnSave').text('Simpan'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable
            }
        });
    });

    $('#form_thnbln').submit(function(e) {
        e.preventDefault();
        var form = $('#form_thnbln')[0];
        var data = new FormData(form);

        $('#btnSave2').text('Sedang Proses, Mohon tunggu...'); //change button text
        $('#btnSave2').attr('disabled', true); //set button disable
        var url;

        if (save_method == 'add') {
            url = "<?php echo base_url($module . 'ajax_add_thnbln') ?>";
        } else {
            url = "<?php echo base_url($module . 'ajax_update') ?>";
        }

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            data: data,
            dataType: "JSON",

            success: function(data) {

                if (data.status == '00') {
                    getList();
                    Swal.fire('Good job!', data.mess, 'success');

                    $('#form_thnbln')[0].reset();
                    $('#modal_form_thnbln').modal('hide');
                } else {
                    Swal.fire('Yaahh...', data.mess, 'error');
                }

                $('#btnSave2').text('Simpan'); //change button text
                $('#btnSave2').attr('disabled', false); //set button enable
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire('Ooppss :(', 'Error adding / update data', 'error');
                $('#btnSave2').text('Simpan'); //change button text
                $('#btnSave2').attr('disabled', false); //set button enable
            }
        });
    });

    function getList() {
        $.ajax({
            url: "<?php echo base_url($module . 'getList') ?>",
            type: "POST",
            dataType: "JSON",

            success: function(data) {
                $('#list-tab').html(data);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire('Ooppss :(', 'Kesalahan get list data', 'error');
            }
        });
    }
    getList();

    function getDatatable(thnbln) {
        $('#judul-tabel').html(thnbln);
        $('#i_thn_bln').val(thnbln);
        thn_bln = thnbln;

        table = $('#table').DataTable({
            "searching": true,
            "destroy": true,
            "processing": true, //Feature control the processing indicator.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url($module . 'ajax_list') ?>",
                "type": "POST",
                "data": {
                    thnbln: thnbln
                },

                "dataSrc": ""
            },

        });
    }

    // $('#karcis_pasar, #keamanan, #parkir').on('input', function() {
    //     // alert('test');
    //     var karcis_pasar = $('#karcis_pasar').val();
    //     var keamanan = $('#keamanan').val();

    //     if (karcis_pasar != '' && keamanan != '') {
    //         $('#persentase_pengelola').val('60');
    //         $('#persentase_petugas').val('40');
    //     } else {
    //         $('#persentase_pengelola').val('40');
    //         $('#persentase_petugas').val('60');
    //     }

    //     // waait one second before calculating the result.
    //     setTimeout(function() {
    //         jumlah = 0;
    //         pengelola = 0;
    //         persentase_pengelola = parseInt($('#persentase_pengelola').val());
    //         persentase_petugas = parseInt($('#persentase_petugas').val());
    //         $(".row .jlh").each(function() {
    //             if ($(this).val() != '') {
    //                 jumlah += parseInt($(this).val());
    //             }
    //         });
    //         jumlah_pengelola = jumlah * persentase_pengelola / 100;
    //         jumlah_petugas = jumlah * persentase_petugas / 100;

    //         $('#jumlah').val(jumlah);
    //         $('#jumlah_pengelola').val(jumlah_pengelola);
    //         $('#jumlah_petugas').val(jumlah_petugas);
    //     }, 400);
    // });

    $('#hitung').click(function() {

        var karcis_pasar = $('#karcis_pasar').val();
        var keamanan = $('#keamanan').val();

        if (karcis_pasar != '' && keamanan != '') {
            $('#persentase_pengelola').val('60');
            $('#persentase_petugas').val('40');
        } else {
            $('#persentase_pengelola').val('40');
            $('#persentase_petugas').val('60');
        }

        // waait one second before calculating the result.
        setTimeout(function() {
            jumlah = 0;
            pengelola = 0;
            persentase_pengelola = parseInt($('#persentase_pengelola').val());
            persentase_petugas = parseInt($('#persentase_petugas').val());
            $(".row .jlh").each(function() {
                if ($(this).val() != '') {
                    jumlah += parseInt($(this).val());
                }
            });
            jumlah_pengelola = jumlah * persentase_pengelola / 100;
            jumlah_petugas = jumlah * persentase_petugas / 100;

            $('#jumlah').val(jumlah);
            $('#jumlah_pengelola').val(jumlah_pengelola);
            $('#jumlah_petugas').val(jumlah_petugas);
        }, 400);
    });


    // $(document).ready(function() {
    //     // datatable
    //     table = $('#table').DataTable({
    //         "searching": true,
    //         "destroy": true,
    //         "processing": true, //Feature control the processing indicator.

    //         // Load data for the table's content from an Ajax source
    //         "ajax": {
    //             "url": "<?php echo base_url($module . 'ajax_list') ?>",
    //             "type": "POST",
    //             "dataSrc": ""
    //         },

    //     });
    // });
</script>