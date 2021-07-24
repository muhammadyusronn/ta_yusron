<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <a href="<?= base_url('create-krt') ?>" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah Data</a>
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
                                            <th>Kategori</th>
                                            <th>Nama Kriteria</th>
                                            <th>Bobot</th>
                                            <th>Sifat</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($data_kriteria as $i) : $no++; ?>
                                            <tr>
                                                <td><?= $i->namakategori ?></td>
                                                <td><?= $i->kriteria_nama ?></td>
                                                <td><?= $i->kriteria_bobot ?></td>
                                                <td><?= $i->kriteria_sifat ?></td>
                                                <td>
                                                    <a href="<?= base_url('kriteria/edit/' . $i->kriteria_id) ?>" class="btn btn-inverse-warning btn-fw" title="EDIT"><i class="fas fa-pen"></i></a>
                                                    <a href="<?= base_url('backend/c_kriteria/destroy/' . $i->kriteria_id); ?>" class="btn btn-inverse-danger btn-fw tombol-hapus" title="HAPUS"><i class="fas fa-trash"></i></a>
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