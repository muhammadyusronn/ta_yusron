<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <a href="<?= base_url('create-usr') ?>" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah Data</a>
            <?php echo $this->session->flashdata('msg'); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?= $title; ?></h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Kontak</th>
                                            <th>Level</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($user_data as $i) : $no++; ?>
                                            <tr>
                                                <td><?= $i->nip ?></td>
                                                <td><?= $i->nama ?></td>
                                                <td><?= $i->kontak ?></td>
                                                <td><?= $i->level ?></td>
                                                <td>
                                                    <a href="<?= base_url('user/edit/' . $i->id_user) ?>" class="btn btn-inverse-warning btn-fw" title="EDIT"><i class="fas fa-pen"></i></a>
                                                    <a href="<?= base_url('backend/c_user/destroy/' . $i->id_user); ?>" class="btn btn-inverse-danger btn-fw tombol-hapus" title="HAPUS"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->