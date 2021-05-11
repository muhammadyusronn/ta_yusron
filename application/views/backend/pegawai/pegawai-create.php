<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $this->session->flashdata('msg'); ?>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Data Pegawai</h4>
                            <form class="cmxform" id="pegawai-create" method="post" action="<?= base_url('pegawai/save') ?>">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="nip">NIP Pegawai</label>
                                        <input id="nip" class="form-control" name="nip" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Pegawai</label>
                                        <input id="nama" class="form-control" name="nama" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan Pegawai</label>
                                        <input id="jabatan" class="form-control" name="jabatan" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="kontak">Kontak Pegawai</label>
                                        <input id="kontak" class="form-control" name="kontak" type="text">
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->