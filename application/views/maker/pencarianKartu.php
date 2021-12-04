<div class="container-fluid" style="margin-bottom: 100px">

    <div class="card mb-3">
        <div class="card-header bg-primary text-white text-center">
            Pencarian Kartu
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('maker/pencarianKartu') ?>">
                <div class="form-group">
                    <select id="inputState" class="form-control">
                        <option selected>Status Permintaan</option>
                        <option value="10">INISIASI REQUEST</option>
                        <option value="0">PERMINTAAN</option>
                        <option value="1">DISETUJUI SATKER</option>
                        <option value="2">DITOLAK SATKER</option>
                        <option value="3">DISETUJUI MABES</option>
                        <option value="4">DITOLAK MABES</option>
                        <option value="5">DALAM PROSES</option>
                        <option value="6">TERCETAK</option>
                        <option value="7">TERDISTRIBUSI</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="inputAddress" placeholder="NRP">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="inputAddress" placeholder="Nama">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="inputAddress" placeholder="Satker Induk">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="inputAddress" placeholder="Sub-Satker">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Tanggal Awal</label>
                        <input type="date" id="inputMulaiTanggal" name="tanggal_awal" class="form-control" name="tgl_awal">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCity">Tanggal Akhir</label>
                        <input type="date" id="inputAkhirTanggal" name="tanggal_akhir" class="form-control" name="tgl_akhir">
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Filter Tanggal
                    </label>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCity"></label>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>

            </form>
        </div>
    </div>
    <?php
    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $bulantahun = $bulan . $tahun;
    } else {
        $bulan = date('m');
        $tahun = date('Y');
        $bulantahun = $bulan . $tahun;
    }

    ?>

    <div class="alert alert-info">
        Menampilkan Data Permintaan Kartu Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span> Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">NRP</th>
                <th class="text-center">NAMA</th>
                <th class="text-center">JABATAN</th>
                <th class="text-center">PANGKAT</th>
                <th class="text-center">TGL REQUEST</th>
                <th class="text-center">JENIS REQUEST</th>
                <th class="text-center">STATUS REQUEST</th>
                <th class="text-center">SATKER</th>
                <th class="text-center">NO.SURAT MAKER</th>
                <th class="text-center">NO.SURAT CHECKER</th>
                <th class="text-center">STATUS KARTU</th>
                <th class="text-center">JUMLAH CETAK</th>
                <th class="text-center"></th>
            </tr>
            <?php
            foreach ($personel as $p) : ?>
                <tr>
                    <td><?php echo $p->id ?></td>
                    <td><?php echo $p->nrp ?></td>
                    <td><?php echo $p->nama ?></td>
                    <td><?php echo $p->jabatan ?></td>
                    <td><?php echo $p->pangkat ?></td>
                    <td><?php echo $p->tgl_input ?></td>
                    <td><?php if ($p->jenis_request == '1') {
                            echo 'Kartu Baru';
                        } else if ($p->jenis_request == '2') {
                            echo 'Penggantian Kartu';
                        } ?></td>
                    <td><?php if ($p->status_request == '0') {
                            echo 'Inisiasi Request';
                        } else if ($p->status_request == '1') {
                            echo 'Permintaan';
                        } else if ($p->status_request == '2') {
                            echo 'Disetujui Satker';
                        } else if ($p->status_request == '3') {
                            echo 'Ditolak Satker';
                        } else if ($p->status_request == '4') {
                            echo 'Disetujui Mabes';
                        } else if ($p->status_request == '5') {
                            echo 'Ditolak Mabes';
                        } else if ($p->status_request == '6') {
                            echo 'Dalam Proses';
                        } else if ($p->status_request == '7') {
                            echo 'Tercetak';
                        } else if ($p->status_request == '8') {
                            echo 'Terdistribusi';
                        } else if ($p->status_request == '9') {
                            echo 'Aktivasi Kartu';
                        } ?></td>
                    <td><?php echo $p->satker ?></td>
                    <td><?php echo $p->noSuratMaker ?></td>
                    <td><?php echo $p->noSuratChecker ?></td>
                    <td><?php if ($p->isAktif == '0') {
                            echo 'Belum Aktif';
                        } else if ($p->isAktif == '1') {
                            echo 'Aktif';
                        } ?></td>
                    <td><?php echo $p->isPrinting ?></td>
                    <td>
                        <a href="<?php echo base_url('maker/detailPermintaan') ?>">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
</div>