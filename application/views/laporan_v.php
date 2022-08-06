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
                    <h4>Filter Laporan</h4>
                  </div>
                  <form class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun Bulan</label>
                      <div class="col-sm-12 col-md-7">
                        <select id="thnbln" name="thnbln" class="form-control selectric"> </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Minggu</label>
                      <div class="col-sm-12 col-md-7">
                        <select id="minggu" name="minggu" class="form-control selectric">
                            <option value="0">-- SEMINGGU --</option>
                            <option value="1">Minggu 1</option>
                            <option value="2">Minggu 2</option>
                            <option value="3">Minggu 3</option>
                            <option value="4">Minggu 4</option>
                            <option value="5">Minggu 5</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button type="submit" class="btn btn-primary">Lihat Laporan</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
    </section>
</div>



<!-- javascript apps -->
<script type="text/javascript">
    var save_method;
    var table;

    function getThnBln()
    {
        let dropdown_group = $('#thnbln');
        dropdown_group.empty();
        // dropdown_group.append('<option selected="true" value="" >-- Pilih --</option>');
        dropdown_group.prop('selectedIndex', 0);
        const url = '<?php echo site_url($module . 'getThnBln') ?>';
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            async: false, //blocks window close
            success: function(data) {
                $.each(data, function(key, isi) {
                    dropdown_group.append($('<option></option>').attr('value', isi.nama).text(isi.nama));
                });

            },
        });
    }
    getThnBln();

</script>