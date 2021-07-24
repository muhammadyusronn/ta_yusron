<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?= $this->session->flashdata('msg'); ?>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Data Departement</h4>
                            <?php foreach ($data_departement as $i) : ?>
                                <form class="cmxform" id="departement-create" method="post" action="<?= base_url('departement/update') ?>">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="namadepartement">Nama Departement</label>
                                            <input class="form-control" name="id_departement" value="<?= $i->id_departement ?>" type="hidden">
                                            <input id="namadepartement" class="form-control" name="namadepartement" value="<?= $i->namadepartement ?>" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsidepartement">Deskripsi Departement</label>
                                            <input id="deskripsidepartement" class="form-control" name="deskripsidepartement" value="<?= $i->deskripsidepartement ?>" type="text">
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