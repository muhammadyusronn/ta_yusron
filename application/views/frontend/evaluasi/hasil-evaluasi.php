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
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Departement</th>
                                            <th>Hasil</th>
                                            <th>Status</th>
                                            <!-- <th>Actions</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($data_pegawai as $j => $i) : $no++;
                                            $hasil_akhir = round($data_hasilpenilaian[$j], 3) * 100;
                                        ?>
                                            <tr>
                                                <td><?= $i->nip ?></td>
                                                <td><?= $i->nama ?></td>
                                                <td><?= $i->namadepartement ?></td>
                                                <td><?= round($data_hasilpenilaian[$j], 3) ?></td>
                                                <td>
                                                    <?php if ($hasil_akhir > 85) { ?>
                                                        <strong style="color: green;">Amat Baik</strong>
                                                    <?php } else if ($hasil_akhir > 75) { ?>
                                                        <strong style="color: green;">Baik</strong>
                                                    <?php } else if ($hasil_akhir > 65) { ?>
                                                        <strong style="color: yellowgreen;">Cukup</strong>
                                                    <?php } else if ($hasil_akhir > 55) { ?>
                                                        <strong style="color: orange;">Kurang</strong>
                                                    <?php } else { ?>
                                                        <strong style="color: red;">Sangat Kurang</strong>
                                                    <?php } ?>
                                                </td>
                                                <!-- <td>
                                                    <a href="" class="btn btn-inverse-success btn-fw" title="DETAIL"><i class="fas fa-eye"></i></a>
                                                </td> -->
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