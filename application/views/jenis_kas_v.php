<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><?= $title ?></h4>
                            <div class="card-header-action">
                                <button class="btn btn-icon icon-left btn-primary" onclick="add_new()"> <i class="fas fa-plus"></i> Tambah </button>
                                <button class="btn btn-icon icon-left btn-primary" onclick="reload_table()"> <i class="fas fa-sync-alt"></i> Refresh </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Jenis Kas</th>
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
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">My Modal</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>

            <form id="form" method="post">
                <div class="modal-body m-3">
                    <input type="hidden" name="id" id="id">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="nama"> Jenis Kas </label>
                                <input type="text" class="form-control" name="nama" id="nama" required autofocus>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
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
    var table;

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax
    }

    function add_new() {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Jenis Kas'); // Set Title to Bootstrap modal title
    }

    function edit(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
        $('.modal-title').text('Edit Jenis Kas'); // Set title to Bootstrap modal title

        $('#password').attr('required', false);
        $('#password_confirm').attr('required', false);

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo base_url($module . 'ajax_edit/') ?>" + id,
            type: "POST",
            dataType: "JSON",

            success: function(data) {

                $('[name="id"]').val(data.id_jenis_kas);
                $('[name="nama"]').val(data.nama);

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

    $('#form').submit(function(e) {
        e.preventDefault();
        var form = $('#form')[0];
        var data = new FormData(form);

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
                    reload_table();
                    Swal.fire('Good job!', data.mess, 'success');

                    $('#form')[0].reset();
                    $('#modal_form').modal('hide');
                } else {
                    Swal.fire('Yaahh...', data.mess, 'error');
                }

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

    $(document).ready(function() {
        // datatable
        table = $('#table').DataTable({
            "searching": true,
            "destroy": true,
            "processing": true, //Feature control the processing indicator.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url($module . 'ajax_list') ?>",
                "type": "POST",
                "dataSrc": ""
            },

        });
    });
</script>