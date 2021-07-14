<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?= $this->session->flashdata('msg'); ?>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Data Kriteria</h4>
                            <form class="cmxform" id="kriteria-create" method="post" action="<?= base_url('kriteria/save') ?>">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="kategori_id">Kategori Kriteria</label>
                                        <select id="kategori_id" class="form-control" name="kategori_id">
                                            <option disabled>Pilih Kategori</option>
                                            <?php foreach ($data_kategori as $i) : ?>
                                                <option value="<?= $i->id_kategori ?>"><?= $i->namakategori ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="kriteria_nama">Nama Kriteria</label>
                                        <input id="kriteria_nama" class="form-control" name="kriteria_nama" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="kriteria_nilai">Nilai Kriteria</label>
                                        <input id="kriteria_nilai" class="form-control" name="kriteria_nilai" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="kriteria_bobot">Bobot Kriteria</label>
                                        <input id="kriteria_bobot" class="form-control" name="kriteria_bobot" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="kriteria_sifat">Sifat Kriteria</label>
                                        <select id="kriteria_sifat" class="form-control" name="kriteria_sifat">
                                            <option disabled>Pilih Sifat</option>
                                            <option>Benefit</option>
                                            <option>Cost</option>
                                        </select>
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