<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?= $this->session->flashdata('msg'); ?>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Data User</h4>
                            <form class="cmxform" id="user-create" method="post" action="<?= base_url('user/save') ?>">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="nip">Nip</label>
                                        <input id="nip" class="form-control" name="nip" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input id="nama" class="form-control" name="nama" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="kontak">Kontak</label>
                                        <input id="kontak" class="form-control" name="kontak" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <select id="level" class="form-control" name="level" required>
                                            <option disabled>Pilih Level User</option>
                                            <option>Penilai</option>
                                            <option>Admin</option>
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