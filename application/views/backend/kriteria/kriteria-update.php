<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?= $this->session->flashdata('msg'); ?>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Data Kriteria</h4>
                            <?php foreach ($data_kriteria as $x) : ?>
                                <form class="cmxform" id="kriteria-create" method="post" action="<?= base_url('kriteria/update') ?>">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="kategori_id">Kategori Kriteria</label>
                                            <select id="kategori_id" class="form-control" name="kategori_id">
                                                <option disabled>Pilih Kategori</option>
                                                <?php foreach ($data_kategori as $i) : ?>
                                                    <option <?php if ($x->kategori_id === $i->id_kategori) {
                                                                echo 'selected';
                                                            } ?> value="<?= $i->id_kategori ?>"><?= $i->namakategori ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kriteria_nama">Nama Kriteria</label>
                                            <input id="kriteria_id" class="form-control" name="kriteria_id" value="<?= $x->kriteria_id ?>" type="hidden">
                                            <input id="kriteria_nama" class="form-control" name="kriteria_nama" value="<?= $x->kriteria_nama ?>" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="kriteria_bobot">Bobot Kriteria</label>
                                            <input id="kriteria_bobot" class="form-control" name="kriteria_bobot" value="<?= $x->kriteria_bobot ?>" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="kriteria_sifat">Sifat Kriteria</label>
                                            <select id="kriteria_sifat" class="form-control" name="kriteria_sifat">
                                                <option disabled>Pilih Sifat</option>
                                                <option <?php if ($x->kriteria_sifat == 'Benefit') {
                                                            echo 'selected';
                                                        } ?>>Benefit</option>
                                                <option <?php if ($x->kriteria_sifat == 'Cost') {
                                                            echo 'selected';
                                                        } ?>>Cost</option>
                                            </select>
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