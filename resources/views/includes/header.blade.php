<header class="app-header">
<nav class="navbar navbar-light bg-light">
      <div class="container">
        <a href="{{route('home.index')}}" class="text-nowrap logo-img">
          <img src="{{asset('assets/images/logos/dark-logo.svg')}}" width="180px" alt="" />
        </a>
        <form class="d-flex">
          <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="{{asset('assets/images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                <div class="message-body">
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-user fs-6"></i>
                    <p class="mb-0 fs-3">حسابي</p>
                  </a>
                  <a href="{{route('grade.index')}}" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-user fs-6"></i>
                    <p class="mb-0 fs-3">إعدادات الترقية</p>
                  </a>
                  <a href="{{route('grade.index')}}" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-user fs-6"></i>
                    <p class="mb-0 fs-3">ادارة المستخدمين  </p>
                  </a><a href="{{route('grade.index')}}" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-user fs-6"></i>
                    <p class="mb-0 fs-3">ادارة الأدوار </p>
                  </a><a href="{{route('grade.index')}}" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-user fs-6"></i>
                    <p class="mb-0 fs-3"> ادارة الصلاحيات </p>
                  </a>
                  <a href="{{route('logout')}}" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                </div>
              </div>
            </li>
          </ul>
        </form>
      </div>
    </nav>
  </header>
