<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?= $this->session->flashdata('msg'); ?>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Data Kategori</h4>
                            <?php foreach ($data_kategori as $i) : ?>
                                <form class="cmxform" id="kategori-create" method="post" action="<?= base_url('kategori/update') ?>">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="namakategori">Nama Kategori</label>
                                            <input class="form-control" name="id_kategori" value="<?= $i->id_kategori ?>" type="hidden">
                                            <input id="namakategori" class="form-control" value="<?= $i->namakategori ?>" name="namakategori" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsikategori">Deskripsi Kategori</label>
                                            <input id="deskripsikategori" class="form-control" value="<?= $i->deskripsikategori ?>" name="deskripsikategori" type="text">
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