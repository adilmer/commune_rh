<nav class="sidebar-nav scroll-sidebar" >
      <ul id="sidebarnav">
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{route('home.index')}}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">القائمة الرئيسية</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="#" data-bs-toggle="dropdown" >
              <span>
                <i class="ti ti-users"></i>
              </span>
              <span class="hide-menu">الموظفين</span>
            </a>
            <ul class="dropdown-menu text-end">
            <li> <a class="dropdown-item" href="{{route('agent.index')}}"> لائحة الموظفين </a></li>
            <li> <a class="dropdown-item" href="{{route('absence.index')}}"> الحضور</a> </li>
            <li> <a class="dropdown-item" href="#"> الترقية</a> </li>
            <li> <a class="dropdown-item" href="#"> الكفاءة المهنية</a> </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="#" data-bs-toggle="dropdown" >
            <span>
              <i class="ti ti-cards"></i>
            </span>
            <span class="hide-menu">الشواهد الادارية</span>
          </a>
          <ul class="dropdown-menu text-end">
            <li> <a class="dropdown-item" href="createdemande.html"> طلب وتيقة</a></li>
            <li> <a class="dropdown-item" href="ordervirement.html"> أمر بتحويل لا رجعة فيه</a> </li>
          </ul>
          </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{route('conge.index')}}" aria-expanded="false">
            <span>
              <i class="ti ti-file-description"></i>
            </span>
            <span class="hide-menu">الرخص الإدارية</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{route('archive.index')}}" aria-expanded="false">
            <span>
              <i class="ti ti-archive"></i>
            </span>
            <span class="hide-menu">الأرشيف</span>
          </a>
        </li>
        <li class="sidebar-item" id="myDropdown">
          <a class="sidebar-link" href="{{route('formation.index')}}" data-bs-toggle="false">
            <span>
              <i class="ti ti-book-2"></i>
            </span>
            <span class="hide-menu">التكوينات</span>
          </a>
        </li>
        <li class="sidebar-item"  id="myDropdown">
          <a class="sidebar-link" href="{{route('stagiaire.index')}}" data-bs-toggle="false">
            <span>
              <i class="ti ti-user"></i>
            </span>
            <span class="hide-menu"> المتدربين</span>
          </a>
        </li>
        <li class="sidebar-item"  id="myDropdown">
          <a class="sidebar-link" href="#" data-bs-toggle="dropdown">
            <span>
              <i class="ti ti-file-description"></i>
            </span>
            <span class="hide-menu">مكتبة الوثائق</span>
          </a>
          <ul class="dropdown-menu text-end">
            <li> <a class="dropdown-item" href="stagiaire.html">قرار الإلحاق</a></li>
            <li> <a class="dropdown-item" href="createstagiaire.html"> طلب الإلحاق</a> </li>
            <li> <a class="dropdown-item" href="createstagiaire.html"> قرار الإدماج </a> </li>
            <li> <a class="dropdown-item" href="createstagiaire.html"> طلب الإدماج </a> </li>
            <li> <a class="dropdown-item" href="createstagiaire.html"> طلب الوضع رهن إشارة  </a> </li>
            <li> <a class="dropdown-item" href="createstagiaire.html"> قرار الوضع رهن إشارة  </a> </li>
            <li> <a class="dropdown-item" href="createstagiaire.html"> قرار الحذف </a> </li>
          </ul>
        </li>
      </ul>
    </nav>

