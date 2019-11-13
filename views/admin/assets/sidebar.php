<nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <ul class="side-menu metismenu">
                    <li>
                        <a href="index.php?url=admin/dashboard"><i class="sidebar-item-icon ti-home"></i>
                            <span class="nav-label">Dashboard</span></a>
                    </li>
                    <?php
                            switch ($_SESSION['role']) {
                                case 'superadmin':
                                    # code...
                                echo '
                    <li>
                        <a href="index.php?url=admin/kindepart"><i class="sidebar-item-icon ti-save"></i>
                            <span class="nav-label">Kinerja Departemen</span></a>
                    </li>
                    <li>
                        <a href="index.php?url=admin/datanggota"><i class="sidebar-item-icon ti-user"></i>
                            <span class="nav-label">Data Anggota</span></a>
                    </li>';
                                    break;
                                default:
                                    # code...
                                echo '
                    <li>
                        <a href="index.php?url=admin/kindepartu"><i class="sidebar-item-icon ti-save"></i>
                            <span class="nav-label">Kinerja Departemen</span></a>
                    </li>';
                                    break;
                            }
                        ?>
                </ul>
                <div class="sidebar-footer">
                    <a href="javascript:;"><i class="ti-announcement"></i></a>
                    <a href="calendar.html"><i class="ti-calendar"></i></a>
                    <a href="javascript:;"><i class="ti-comments"></i></a>
                    <a href="index.php?url=logout"><i class="ti-power-off"></i></a>
                </div>
            </div>
        </nav>