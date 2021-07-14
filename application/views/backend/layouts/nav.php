<div class="horizontal-menu">
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo-mini" href="<?= base_url('dash') ?>"></a>
                <a class="navbar-brand brand-logo" href="<?= base_url('dash') ?>">Rumah Sakit Dr. Noesmir Baturaja</a>
                <!-- <a class="navbar-brand brand-logo" href="<?= base_url('dash') ?>"><img src="https://www.bootstrapdash.com/demo/justdo/template/images/logo-white.svg" alt="logo" /></a> -->
                <!-- <a class="navbar-brand brand-logo-mini" href="<?= base_url('dash') ?>"><img style="width: 40px; height: 60px;" src="https://1.bp.blogspot.com/-6GAmbNZkec0/Vx5AUT0vdGI/AAAAAAAAXHw/5NBaJ_u9Q58ffr8IgY6OZDfJv-j66B39QCLcB/s1600/Logo%2BTNI%2BAD.png" alt="logo" /></a> -->
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown mr-1">
                        <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                            <i class="fas fa-envelope mx-0"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="<?= base_url('assets/') ?>images/faces/face4.jpg" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                                    </h6>
                                    <p class="font-weight-light small-text text-muted mb-0">
                                        The meeting is cancelled
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="<?= base_url('assets/') ?>images/faces/face2.jpg" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                                    </h6>
                                    <p class="font-weight-light small-text text-muted mb-0">
                                        New product launch
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="<?= base_url('assets/') ?>images/faces/face3.jpg" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                                    </h6>
                                    <p class="font-weight-light small-text text-muted mb-0">
                                        Upcoming board meeting
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="fas fa-bell mx-0"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="ti-info-alt mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">Application Error</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        Just now
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="ti-settings mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">Settings</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        Private message
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="ti-user mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">New user registration</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        2 days ago
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="<?= base_url('assets/images/faces/face28.jpg'); ?>" alt="profile" />
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
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="ti-pencil-alt menu-icon"></i>
                            <span class="menu-title">Penilaian</span>
                            <i class="fas fa-sort-down menu-arrow"></i></a>
                        <div class="submenu">
                            <ul class="submenu-item">
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('create-pnl') ?>">Tambah Penilaian</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('penilaian') ?>">Data Penilaian</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    <?php } ?>
</div>