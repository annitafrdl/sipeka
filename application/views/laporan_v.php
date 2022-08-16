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
                    <option value="0">-- KESELURUHAN --</option>
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


        <?php if ($reports) { ?>
          <div class="col-12">
            <div class="card">
              <form class="card-body">

                <?php
                // echo '<pre>';
                // print_r($reports);
                // echo '</pre>';
                $pemasukan = 0;
                $pengeluaran = 0;
                $jumlah = 0;
                $pengelola = 0;
                $bumdes = 0;

                foreach ($reports as $key => $report) {
                  // if ($key = 1) {
                  $totaljlh = '0';
                  $jlh_pengluaran = '0';
                  $minggu = 'Minggu ke ' . $key;
                  echo '<div class="table-responsive">
                        <table id="table" class="table table-striped" style="width: 100%;">
                          <thead>
                            <tr>
                              <th>Tanggal</th>
                              <th>Nama</th>
                              <th>Kas Masuk</th>
                              <th>Persentase</th>
                            </tr>
                          </thead>';

                  foreach ($report as $row) {
                    $totaljlh += $row['jumlah_pengelola'];
                    $jlh_pengluaran += $row['pengeluaran'];

                    echo '<tbody>
                              <tr>
                                <td>' . date('d-m-Y', strtotime($row['tgl'])) . '</td>
                                <td>' . $row['nama'] . ' <br>  Jumlah <br> Pengelola <br>Petugas <br></td>
                                <td>' . $row['kas_masuk'] . '<br> (Rp. ' . number_format($row['jumlah'], 0, ',', '.') . ')<br> 
                                (Rp. ' . number_format($row['jumlah_pengelola'], 0, ',', '.') . ')<br>
                                (Rp. ' . number_format($row['jumlah_petugas'], 0, ',', '.') . ')<br>
                                </td>
                                <td>' . $row['enter'] . '<br><br>' . $row['persentase_pengelola'] . '% <br>' . $row['persentase_petugas'] . '% <br><br></td>
                              </tr> 
                            </tbody>';
                  }
                  $pemasukan += $totaljlh; // perjumlahan pemasukan dalam per minggu
                  $pengeluaran += $jlh_pengluaran; // perjumlahan pengeluaran dalam per minggu
                  $jumlah = $pemasukan - $pengeluaran; // perjumlahan pemasukan - pengeluaran dalam per minggu

                  // jumlah 40 %
                  $pengelola = $jumlah * 0.4;
                  $bumdes = $jumlah * 0.6;

                  echo '<tfoot>
                            <tr>
                              <th colspan="3"><b>Jumlah Keseluruhan ' . $minggu . ' : </b></th>
                              <th>Rp. ' . number_format($totaljlh, 0, ',', '.') . '</th>
                              <th colspan="2"></th>
                            </tr>
                          </tfoot>
                        </table>
                        </div>';
                  // }
                ?>

                <?php } ?>

                <?php if ($this->input->get('minggu') == 0) { ?>
                  <p><b>Rekap Bulan Tahun : Rp. <?= $this->input->get('thnbln') ?></b> </p>
                  <table style="width: 350px;">
                    <tr>
                      <td>Pemasukan </td>
                      <td> : </td>
                      <td> Rp. <?= number_format($pemasukan, 0, ',', '.') ?> </td>
                    </tr>
                    <tr>
                      <td>Pengeluaran </td>
                      <td> : </td>
                      <td> Rp. <?= number_format($pengeluaran, 0, ',', '.') ?> </td>
                    </tr>
                    <tr>
                      <td>Jumlah </td>
                      <td> : </td>
                      <td> Rp. <?= number_format($jumlah, 0, ',', '.') ?> </td>
                    </tr>
                    <tr>
                      <td>Pengelola (40%) </td>
                      <td> : </td>
                      <td> Rp. <?= number_format($pengelola, 0, ',', '.') ?> </td>
                    </tr>
                    <tr>
                      <td>Bumdes (60%) </td>
                      <td> : </td>
                      <td> Rp. <?= number_format($bumdes, 0, ',', '.') ?> </td>
                    </tr>
                  </table>
                  <!-- <strong>
                    <p><b>Pemasukan : Rp. <?= number_format($pemasukan, 0, ',', '.') ?></b> </p>
                    <p><b>Pengeluaran : Rp. <?= number_format($pengeluaran, 0, ',', '.') ?></b> </p>
                    <p><b>Jumlah : Rp. <?= number_format($jumlah, 0, ',', '.') ?></b> </p>
                    <p><b> Pengelola (40%): Rp. <?= number_format($pengelola, 0, ',', '.') ?></b> </p>
                    <p><b> Bumdes (60%): Rp. <?= number_format($bumdes, 0, ',', '.') ?></b> </p>
                  </strong> -->
                <?php } ?>

              </form>
            </div>
          </div>
        <?php } ?>

      </div>
  </section>
</div>



<!-- javascript apps -->
<script type="text/javascript">
  var save_method;
  var table;

  function getThnBln() {
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