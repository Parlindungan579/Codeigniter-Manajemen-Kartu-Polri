<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="margin-bottom: 120px; width: 90%">

        <div class="card-body">
            <div class="row">
                <div class="col-md-7">

                    <form class="user" method="POST" action="<?php echo base_url('maker/permintaanKartu/permintaanKartuAksi') ?>" enctype="multipart/form-data">

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">NRP</label>
                            <div class="col-sm-8">
                                <input type="text" name="nrp" class="form-control" value="<?php echo $personel['nrp']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-4 col-form-label">NAMA</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $personel['nama_lengkap']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">TEMPAT LAHIR</label>
                            <div class="col-sm-8">
                                <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $personel['tempat_lahir']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">TANGGAL LAHIR</label>
                            <div class="col-sm-8">
                                <input type="text" name="tanggal_lahir" class="form-control" value="<?php echo $personel['tanggal_lahir']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">JABATAN</label>
                            <div class="col-sm-8">
                                <input type="text" name="jabatan" class="form-control" value="<?php echo $personel['jabatan']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">TMT JABATAN</label>
                            <div class="col-sm-8">
                                <input type="text" name="tmt_jabatan" class="form-control" value="<?php echo $personel['tmt_jabatan']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">PANGKAT</label>
                            <div class="col-sm-8">
                                <input type="text" name="pangkat" class="form-control" value="<?php echo $personel['pangkat']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">TMT PANGKAT</label>
                            <div class="col-sm-8">
                                <input type="text" name="tmt_pangkat" class="form-control" value="<?php echo $personel['tmt_pangkat']; ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">SATKER</label>
                            <div class="col-sm-8">
                                <input type="text" name="satker" class="form-control" value="<?php echo $personel['kesatuan']; ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label style="display:none;" for="inputEmail3" class="col-sm-4 col-form-label">TANGGAL INPUT</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="tgl_input" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">JENIS PERMINTAAN</label>
                            <div class="col-sm-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_request" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">Baru</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_request" id="inlineRadio2" value="2">
                                    <label class="form-check-label" for="inlineRadio2">Penggantian</label>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label style="display:none;" for="inputEmail3" class="col-sm-4 col-form-label">STATUS PERMINTAAN</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="status_request" value="0">
                            </div>
                        </div>

                        <div>
                            <label style="display:none;" for="inputEmail3" class="col-sm-4 col-form-label">STATUS KARTU</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="status_kartu" value="0">
                            </div>
                        </div>

                        <div>
                            <label style="display:none;" for="inputEmail3" class="col-sm-4 col-form-label">JUMLAH CETAK</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="jumlah_cetak" value="0">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Kelengkapan Binkar</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo "100"; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Kelengkapan Full</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo "83,78"; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <button type="button" onclick="history.back();" class="btn btn-primary">Kembali</button>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-md-5">
                    <!-- <img style="width: 150px" src="data:image/jpeg;base64,<?php echo base64_encode($personel['foto_file']) ?>" />; -->
                    <img style="width: 250px" src="http://cake.watan.polri.go.id:12690/bri-api/storagelendra/personel/<?php echo $personel['foto_file'] ?>">
                </div>
            </div>
        </div>
    </div>
</div>