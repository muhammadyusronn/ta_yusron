<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
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
                                            <th>Nama Jabatan</th>
                                            <th>Deskripsi</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($jabatan_data as $i) : $no++; ?>
                                            <tr>
                                                <td><?= $i->namajabatan ?></td>
                                                <td><?= $i->deskripsijabatan ?></td>
                                                <td>
                                                    <a class="btn btn-inverse-primary btn-fw" title="Detail"><i class="fas fa-eye"></i></a>
                                                    <a href="<?= base_url('backend/c_jabatan/destroy/' . $i->id_jabatan); ?>" class="btn btn-inverse-danger btn-fw" title="HAPUS"><i class="fas fa-trash"></i></a>
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