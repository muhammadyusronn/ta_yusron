<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?= $this->session->flashdata('msg'); ?>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Data Jabatan</h4>
                            <form class="cmxform" id="jabatan-create" method="post" action="<?= base_url('jabatan/save') ?>">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="namajabatan">Nama Jabatan</label>
                                        <input id="namajabatan" class="form-control" name="namajabatan" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsijabatan">Deskripsi Jabatan</label>
                                        <input id="deskripsijabatan" class="form-control" name="deskripsijabatan" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="departement_id">Departement</label>
                                        <select id="departement_id" class="form-control" name="departement_id">
                                            <option disabled>Pilih departement</option>
                                            <?php foreach ($departement_data as $i) : ?>
                                                <option value="<?= $i->id_departement ?>"><?= $i->namadepartement; ?></option>
                                            <?php endforeach; ?>
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