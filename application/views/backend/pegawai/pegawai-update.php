<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $this->session->flashdata('msg'); ?>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Data Pegawai</h4>
                            <?php foreach ($data_pegawai as $i) : ?>
                                <form class="cmxform" id="pegawai-create" method="post" action="<?= base_url('pegawai/update') ?>">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="nip">NIP Pegawai</label>
                                            <input class="form-control" name="id_pegawai" value="<?= $i->id_pegawai ?>" type="hidden">
                                            <input id="nip" class="form-control" name="nip" value="<?= $i->nip ?>" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Pegawai</label>
                                            <input id="nama" class="form-control" name="nama" value="<?= $i->nama ?>" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="departement_id">Departement</label>
                                            <select id="departement_id" class="form-control" name="departement_id">
                                                <option disabled>Pilih Departement</option>
                                                <?php foreach ($data_departement as $j) : ?>
                                                    <option <?php if ($i->departement_id == $j->id_departement) {
                                                                echo 'selected';
                                                            } ?> value="<?= $j->id_departement ?>"><?= $j->namadepartement ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kontak">Kontak Pegawai</label>
                                            <input id="kontak" class="form-control" name="kontak" value="<?= $i->kontak ?>" type="text">
                                        </div>
                                        <input class="btn btn-primary" type="submit" value="Submit">
                                    </fieldset>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->