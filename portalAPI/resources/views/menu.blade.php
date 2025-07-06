<!-- Menu Principal -->

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
              </span>
              
              <span class="app-brand-text demo menu-text fw-bolder ms-2">
                  <img src="{{ asset('img/activo_logo.png') }}" width="180" height="40" />

              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="index.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Administ. Usuarios</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="<?=route('index_rol')?>" class="menu-link">
                    <div data-i18n="Without menu">Act. Roles</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?=route('usuario_index')?>" class="menu-link">
                    <div data-i18n="Without navbar">Act. Usuarios Aliados</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?=route('usuarioAdm_index')?>" class="menu-link">
                    <div data-i18n="Without navbar">Act. Usuarios Banco</div>
                  </a>
                </li>

              </ul>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">API'S</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">APIS</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="<?=route('index_api')?>" class="menu-link">
                    <div data-i18n="Account">Act. Apis</div>
                  </a>
                </li>
              </ul>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="<?=route('asignar_api')?>" class="menu-link">
                    <div data-i18n="Account">Asignar Apis</div>
                  </a>
                </li>
              </ul>

            </li>

            <!-- Components -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Aliados</span></li>
            <!-- Cards -->
            <li class="menu-item">
              <a href="<?=route('index_aliado')?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Act Aliados</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="<?=route('act_aliado')?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Activar / desactivar Aliado</div>
              </a>
            </li>

          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->


          <!-- / Navbar -->
