<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="margin-bottom: 120px; width: 65%">
        <form method="POST" action="<?php echo base_url('maker/detailPermintaan') ?>" enctype=" multipart/form-data">
            <?php foreach ($personel as $p) : ?>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <table class="table">
                                <tr>
                                    <td>ID</td>
                                    <td>:</td>
                                    <td><?php echo $p->id ?></td>
                                </tr>
                                <tr>
                                    <td>NRP</td>
                                    <td>:</td>
                                    <td><?php echo $p->nrp ?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?php echo $p->nama ?></td>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td>:</td>
                                    <td><?php echo $p->jabatan ?></td>
                                </tr>
                                <tr>
                                    <td>Pangkat</td>
                                    <td>:</td>
                                    <td><?php echo $p->pangkat ?></td>
                                </tr>
                                <tr>
                                    <td>Satker</td>
                                    <td>:</td>
                                    <td><?php echo $p->satker ?></td>
                                </tr>
                                <tr>
                                    <td>User Input</td>
                                    <td>:</td>
                                    <td><?php echo date("d M Y") ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Input</td>
                                    <td>:</td>
                                    <td><?php echo date("d M Y") ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Req</td>
                                    <td>:</td>
                                    <?php if ($p->jenis_request == '1') { ?>
                                        <td>Kartu Baru</td>
                                    <?php } else { ?>
                                        <td>Penggantian</td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <?php if ($p->status_request == '0') { ?>
                                        <td>INISIASI REQUEST</td>
                                    <?php } else if ($p->status_request == '1') { ?>
                                        <td>PERMINTAAN</td>
                                    <?php } else if ($p->status_request == '3') { ?>
                                        <td>DITOLAK SATKER</td>
                                    <?php } ?>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-5">
                            <!-- <img style="width: 150px" src="data:image/jpeg;base64,<?php echo base64_encode($personel['foto']) ?>" />; -->
                            <img style="width: 250px" src="http://cake.watan.polri.go.id:12690/bri-api/storagelendra/personel/">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button type="button" onclick="history.back();" class="btn btn-primary">Kembali</button>
                    </div>
                </div>

            <?php endforeach; ?>
        </form>
    </div>

</div>