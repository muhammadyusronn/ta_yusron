<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?= $this->session->flashdata('msg'); ?>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Data User</h4>
                            <?php foreach ($data_user as $i) : ?>
                                <form class="cmxform" id="user-create" method="post" action="<?= base_url('user/update') ?>">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="nip">Nip</label>
                                            <input type="hidden" class="form-control" name="id_user" value="<?= $i->id_user ?>" type="text">
                                            <input id="nip" class="form-control" name="nip" value="<?= $i->nip ?>" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input id="nama" class="form-control" name="nama" value="<?= $i->nama ?>" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="kontak">Kontak</label>
                                            <input id="kontak" class="form-control" name="kontak" value="<?= $i->kontak ?>" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="level">Level</label>
                                            <select id="level" class="form-control" name="level" required>
                                                <option disabled>Pilih Level User</option>
                                                <option <?php if ($i->level == 'Penilai') {
                                                            echo 'selected';
                                                        } ?>>Penilai</option>
                                                <option <?php if ($i->level == 'Admin') {
                                                            echo 'selected';
                                                        } ?>> Admin</option>
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