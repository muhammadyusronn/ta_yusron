<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?= $this->session->flashdata('msg'); ?>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Data Kategori</h4>
                            <form class="cmxform" id="kategori-create" method="post" action="<?= base_url('kategori/save') ?>">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="namakategori">Nama Kategori</label>
                                        <input id="namakategori" class="form-control" name="namakategori" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsikategori">Deskripsi Kategori</label>
                                        <input id="deskripsikategori" class="form-control" name="deskripsikategori" type="text">
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