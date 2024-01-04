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
        @can('agent')
        <li class="sidebar-item">
            <a class="sidebar-link" href="#" data-bs-toggle="dropdown" >
              <span>
                <i class="ti ti-users"></i>
              </span>
              <span class="hide-menu">الموظفين</span>
            </a>
            <ul class="dropdown-menu text-end">
                @can('agent.index')
                <li> <a class="dropdown-item" href="{{route('agent.index')}}"> لائحة الموظفين </a></li>
                @endcan
                @can('absence.index')
            <li> <a class="dropdown-item" href="{{route('absence.index')}}"> الحضور</a> </li>
            @endcan
            @can('avancement.avancement_echelle')
            <li> <a class="dropdown-item" href="{{route('avancement.avancement_echelle')}}">الترقية في الدرجة</a> </li>
            @endcan
            @can('avancement.avancement_echellon')
            <li> <a class="dropdown-item" href="{{route('avancement.avancement_echellon')}}">الترقية في الرتبة</a> </li>
            @endcan
            @can('aptitude.index')
            <li> <a class="dropdown-item" href="{{route('aptitude.index')}}"> الكفاءة المهنية</a> </li>
            @endcan
            @can('notation.index')
            <li> <a class="dropdown-item" href="{{route('notation.index')}}"> تنقيط الموظفين </a> </li>
            @endcan
          </ul>
        </li>
        @endcan
        @can('attestation')
        <li class="sidebar-item">
          <a class="sidebar-link" href="#" data-bs-toggle="dropdown" >
            <span>
              <i class="ti ti-cards"></i>
            </span>
            <span class="hide-menu">الشواهد الادارية</span>
          </a>
          <ul class="dropdown-menu text-end">
            @can('attestation.index')
            <li> <a class="dropdown-item" href="{{route('attestation.index')}}"> طلب وتيقة</a></li>
            @endcan
            @can('attestation.ordervirement')
            <li> <a class="dropdown-item" href="{{route('attestation.ordervirement')}}"> أمر بتحويل لا رجعة فيه</a> </li>
            @endcan
          </ul>
          </li>
        @endcan
        @can('conge')
        <li class="sidebar-item">
            @can('conge.index')
          <a class="sidebar-link" href="{{route('conge.index')}}" aria-expanded="false">
            @endcan
            <span>
              <i class="ti ti-file-description"></i>
            </span>
            <span class="hide-menu">الرخص الإدارية</span>
          </a>
        </li>
        @endcan
        @can('archive')
        <li class="sidebar-item">
            @can('archive.index')
          <a class="sidebar-link" href="{{route('archive.index')}}" aria-expanded="false">
            @endcan
            <span>
              <i class="ti ti-archive"></i>
            </span>
            <span class="hide-menu">الأرشيف</span>
          </a>
        </li>
        @endcan
        @can('formation')
        <li class="sidebar-item" id="myDropdown">
            @can('formation.index')
          <a class="sidebar-link" href="{{route('formation.index')}}" data-bs-toggle="false">
            @endcan
            <span>
              <i class="ti ti-book-2"></i>
            </span>
            <span class="hide-menu">التكوينات</span>
          </a>
        </li>
        @endcan
        @can('stagiaire')
        <li class="sidebar-item"  id="myDropdown">
            @can('stagiaire.index')
          <a class="sidebar-link" href="{{route('stagiaire.index')}}" data-bs-toggle="false">
            @endcan
            <span>
              <i class="ti ti-user"></i>
            </span>
            <span class="hide-menu"> المتدربين</span>
          </a>
        </li>
        @endcan
        @can('attestation.')
        <li class="sidebar-item"  id="myDropdown">
          <a class="sidebar-link" href="#" data-bs-toggle="dropdown">
            <span>
              <i class="ti ti-file-description"></i>
            </span>
            <span class="hide-menu">مكتبة الوثائق</span>
          </a>
          <ul class="dropdown-menu text-end">
            @can('attestation.index')
            <li> <a class="dropdown-item" href="stagiaire.html">قرار الإلحاق</a></li>
            @endcan
            @can('attestation.index')
            <li> <a class="dropdown-item" href="createstagiaire.html"> طلب الإلحاق</a> </li>
            @endcan
            @can('attestation.index')
            <li> <a class="dropdown-item" href="createstagiaire.html"> قرار الإدماج </a> </li>
            @endcan
            @can('attestation.allocationfamilial')
            <li> <a class="dropdown-item" href="{{route('attestation.allocationfamilial')}}">Allocation familiale </a> </li>
            @endcan
            @can('attestation.bordereau_ar')
            <li> <a class="dropdown-item" href="{{route('attestation.bordereau_ar')}}"> ورقة الإرسال </a> </li>
            @endcan
            @can('attestation.bordereau_fr')
            <li> <a class="dropdown-item" href="{{route('attestation.bordereau_fr')}}"> Bordereau  </a> </li>
            @endcan
            @can('attestation.message')
            <li> <a class="dropdown-item" href="{{route('attestation.message')}}"> مراسلة  </a> </li>
            @endcan
            @can('attestation.tps')
            <li> <a class="dropdown-item" href="{{route('attestation.tps')}}">تعويضات TPS</a> </li>
            @endcan
            @can('attestation.annulationtps')
            <li> <a class="dropdown-item" href="{{route('attestation.annulationtps')}}"> إلغاء تعويضات TPS</a> </li>
            @endcan
            @can('absence.index')
            <li> <a href="{{route('attestation.decisionretraite')}}" class="dropdown-item" > وثائق الإحالة على التقاعد</a> </li>
            @endcan
            @can('absence.index')
            <li> <a href="{{route('home.listconge')}}" class="dropdown-item"> وثائق تسوية الوضعية الإدارية</a> </li>
            @endcan
          </ul>
        </li>
        @endcan
        @can('grade')
        <li class="sidebar-item">
            <a class="sidebar-link" href="#" data-bs-toggle="dropdown" >
              <span>
                <i class="ti ti-settings"></i>
              </span>
              <span class="hide-menu"> الإعدادات</span>
            </a>
            <ul class="dropdown-menu text-end">
                @can('grade.index')
              <li> <a class="dropdown-item" href="{{route('grade.index')}}"> اعدادات الترقية </a></li>
              @endcan
            </ul>
            </li>
            @endcan
            {{-- @can('users') --}}
            <li class="sidebar-item">
                <a class="sidebar-link" href="#123" data-bs-toggle="dropdown" >
                  <span>
                    <i class="ti ti-cards"></i>
                  </span>
                  <span class="hide-menu">  المستخدمين</span>
                </a>
                <ul class="dropdown-menu text-end">
                    @can('users.index')
                  <li> <a class="dropdown-item" href="{{route('users.index')}}"> ادارة المستخدمين </a></li>
                  @endcan
                  @can('roles.index')
                  <li> <a class="dropdown-item" href="{{route('roles.index')}}"> ادارة الأدوار </a></li>
                  @endcan
                  @can('permissions.index')
                  <li> <a class="dropdown-item" href="{{route('permissions.index')}}"> ادارة الصلاحيات </a></li>
                  @endcan
                </ul>
                </li>
                {{-- @endcan --}}
      </ul>


    </nav>

