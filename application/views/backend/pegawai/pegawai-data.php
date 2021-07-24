<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <a href="<?= base_url('create-pgw') ?>" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah Data</a>
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
                                            <th>Nama Pegawai</th>
                                            <th>Departement</th>
                                            <th>Kontak</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($pegawai_data as $i) : $no++; ?>
                                            <tr>
                                                <td><?= $i->nip ?></td>
                                                <td><?= $i->nama ?></td>
                                                <td><?= $i->namadepartement ?></td>
                                                <td><?= $i->kontak ?></td>
                                                <td>
                                                    <a href="<?= base_url('pegawai/edit/' . $i->id_pegawai) ?>" class="btn btn-inverse-warning btn-fw" title="EDIT"><i class="fas fa-pen"></i></a>
                                                    <a href="<?= base_url('backend/c_pegawai/destroy/' . $i->id_pegawai); ?>" class="btn btn-inverse-danger btn-fw tombol-hapus" title="HAPUS"><i class="fas fa-trash"></i></a>
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