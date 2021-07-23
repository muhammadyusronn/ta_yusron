<div class="horizontal-menu">
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <?php if ($this->data['token']['level'] == 'Admin') { ?>
                    <a class="navbar-brand brand-logo-mini" href="<?= base_url('dash') ?>"></a>
                    <a class="navbar-brand brand-logo" href="<?= base_url('dash') ?>">Rumah Sakit Dr. Noesmir Baturaja</a>
                <?php } else { ?>
                    <a class="navbar-brand brand-logo-mini" href="<?= base_url('evaluasi') ?>"></a>
                    <a class="navbar-brand brand-logo" href="<?= base_url('evaluasi') ?>">Rumah Sakit Dr. Noesmir Baturaja</a>
                <?php } ?>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="<?= base_url('assets/images/icon.png'); ?>" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="<?= base_url('logout'); ?>">
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                    <span class="ti-menu"></span>
                </button>
            </div>
        </div>
    </nav>
    <?php if ($this->data['token']['level'] == 'Admin') { ?>
        <nav class="bottom-navbar">
            <div class="container">
                <ul class="nav page-navigation">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('dash') ?>">
                            <i class="fas fa-home menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user menu-icon"></i>
                            <span class="menu-title">User</span>
                            <i class="fas fa-sort-down menu-arrow"></i></a>
                        <div class="submenu">
                            <ul class="submenu-item">
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('create-usr') ?>">Tambah User</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('user') ?>">Data User</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="ti-user menu-icon"></i>
                            <span class="menu-title">Pegawai</span>
                            <i class="fas fa-sort-down menu-arrow"></i></a>
                        <div class="submenu">
                            <ul class="submenu-item">
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('create-pgw') ?>">Tambah Pegawai</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('pegawai') ?>">Data Pegawai</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="ti-desktop menu-icon"></i>
                            <span class="menu-title">Departement</span>
                            <i class="fas fa-sort-down menu-arrow"></i></a>
                        <div class="submenu">
                            <ul class="submenu-item">
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('create-dpt') ?>">Tambah Departement</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('departement') ?>">Data Departement</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="ti-support menu-icon"></i>
                            <span class="menu-title">Kategori Kriteria</span>
                            <i class="fas fa-sort-down menu-arrow"></i></a>
                        <div class="submenu">
                            <ul class="submenu-item">
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('create-ktg') ?>">Tambah Kategori</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('kategori') ?>">Data Kategori</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="ti-pencil-alt menu-icon"></i>
                            <span class="menu-title">Kriteria</span>
                            <i class="fas fa-sort-down menu-arrow"></i></a>
                        <div class="submenu">
                            <ul class="submenu-item">
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('create-krt') ?>">Tambah Kriteria</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('kriteria') ?>">Data Kriteria</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    <?php } ?>
</div>