<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Admin</h4>
                            </div>
                            <div class="card-body">
                                <?= $totadmin ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-money-bill"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Pendapatan </h4>
                            </div>
                            <div class="card-body">
                                <span id="bumdes"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Total Pendapatan Bulan Berjalan</h4>
                            <div class="card-header-action">
                                <button class="btn btn-icon icon-left btn-primary" onclick="reload_table()"> <i class="fas fa-sync-alt"></i> Refresh </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if ($reports) { ?>
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
                                <?php } ?>
                                <script>
                                    $('#bumdes').text('Rp. <?= number_format($bumdes, 0, ',', '.') ?>');
                                </script>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>