<body>

<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <?php// if(!isset($_SESSION)) session_start(); ?>
          <?php if($_COOKIE['level'] == 1){ ?>
          <img src="../assets/img/icons/logo_admin.png" class="navbar-brand-img" alt="...">
          <?php } ?>
          <?php if($_COOKIE['level'] == 2){ ?>
          <img src="../assets/img/icons/logo_nhan_vien.png" class="navbar-brand-img" alt="...">
          <?php } ?>
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <?php if($_COOKIE['level'] == 1){ ?>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="../san_pham">
                <i class="ni ni-books text-green"></i>
                <span class="nav-link-text">Quản Lý Sách</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../tac_gia">
                <i class="ni ni-single-02 text-red"></i>
                <span class="nav-link-text">Quản Lý Tác Giả</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../the_loai">
                <i class="ni ni-bullet-list-67 text-primary"></i>
                <span class="nav-link-text">Quản Lý Thể Loại</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../banner">
                <i class="ni ni-image text-yellow"></i>
                <span class="nav-link-text">Quản Lý Banner</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../footer">
                <i class="ni ni-html5 text-default"></i>
                <span class="nav-link-text">Quản Lý Footer</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../don_hang">
                <i class="ni ni-bag-17 text-blue"></i>
                <span class="nav-link-text">Quản Lý Đơn Hàng</span>
              </a>
            </li>
          </ul>
          <?php } else{?>
            <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="../don_hang">
                <i class="ni ni-bag-17 text-blue"></i>
                <span class="nav-link-text">Quản Lý Đơn Hàng</span>
              </a>
            </li>
          </ul>
          <?php } ?>
        </div>
      </div>
    </div>
  </nav>