<nav class="navbar navbar-expand-lg navbar-light ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <!-- Your navigation items go here -->
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link btn btn-light" href="{{route('home.index')}}" aria-expanded="false">
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
            <a class="sidebar-link btn btn-light" href="#1" data-bs-toggle="dropdown" >
              <span>
                <i class="ti ti-users"></i>
              </span>
              <span class="hide-menu">الموظفين</span>
            </a>
            <ul class="dropdown-menu text-end " style="position: inherit; z-index: 1000;">
                @can('agent.index')
                <li> <a class="dropdown-item" href="{{route('agent.index')}}"> لائحة الموظفين </a></li>
                @endcan
                @can('absence.index')
            <li> <a class="dropdown-item" href="{{route('absence.index')}}"> الحضور</a> </li>
            @endcan
          </ul>
        </li>
        @endcan
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          </li>
        @can('member')
        <li class="sidebar-item">
            <a class="sidebar-link btn btn-light" href="#2" data-bs-toggle="dropdown" >
              <span>
                <i class="ti ti-id-badge"></i>
              </span>
              <span class="hide-menu">الأعضاء</span>
            </a>
            <ul class="dropdown-menu text-end " style="position: inherit; z-index: 1000;">
                @can('member.index')
                <li> <a class="dropdown-item" href="{{route('member.index')}}"> لائحة الأعضاء </a></li>
                @endcan
                @can('member.salaire')
                <li> <a class="dropdown-item" href="{{route('member.salaire')}}"> تعويضات الأعضاء</a></li>
                @endcan
          </ul>
        </li>
        @endcan
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          </li>
        @can('avancement')
        <li class="sidebar-item">
            <a class="sidebar-link btn btn-light" href="#3" data-bs-toggle="dropdown" >
              <span>
                <i class="ti ti-arrow-up"></i>
              </span>
              <span class="hide-menu">الترقية</span>
            </a>
            <ul class="dropdown-menu text-end " style="position: inherit; z-index: 1000;">
            @can('avancement.avancement_echelle')
            <li> <a class="dropdown-item" href="{{route('avancement.avancement_echelle')}}">الترقية في الدرجة</a> </li>
            @endcan
            @can('avancement.avancement_echellon')
            <li> <a class="dropdown-item" href="{{route('avancement.avancement_echellon')}}">الترقية في الرتبة</a> </li>
            @endcan
            @can('avancement.tableavancement')
            <li> <a class="dropdown-item" href="{{route('avancement.tableavancement')}}"> جدول الترقية </a> </li>
            @endcan
            @can('aptitude.index')
            <li> <a class="dropdown-item" href="{{route('aptitude.index')}}"> الكفاءة المهنية</a> </li>
            @endcan
            @can('notation.index')
            <li> <a class="dropdown-item" href="{{route('notation.index')}}"> تنقيط الموظفين </a> </li>
            @endcan
            @can('commission.index')
            <li> <a class="dropdown-item" href="{{route('commission.index')}}"> تواريخ اللجان والقرارات</a> </li>
            @endcan
          </ul>
        </li>
        @endcan
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          </li>
        @can('attestation')
        <li class="sidebar-item">
          <a class="sidebar-link btn btn-light" href="#4" data-bs-toggle="dropdown" >
            <span>
              <i class="ti ti-cards"></i>
            </span>
            <span class="hide-menu">الشواهد الادارية</span>
          </a>
          <ul class="dropdown-menu text-end " style="position: inherit; z-index: 1000;">
            @can('attestation.index')
            <li> <a class="dropdown-item" href="{{route('attestation.index')}}"> طلب وتيقة</a></li>
            @endcan
            @can('attestation.ordervirement')
            <li> <a class="dropdown-item" href="{{route('attestation.ordervirement')}}"> أمر بتحويل لا رجعة فيه</a> </li>
            @endcan
          </ul>
          </li>
        @endcan
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          </li>
        @can('conge')
        <li class="sidebar-item">
            @can('conge.index')
          <a class="sidebar-link btn btn-light" href="{{route('conge.index')}}" aria-expanded="false">
            @endcan
            <span>
              <i class="ti ti-file-description"></i>
            </span>
            <span class="hide-menu">الرخص الإدارية</span>
          </a>
        </li>
        @endcan
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          </li>
        @can('archive')
        <li class="sidebar-item">
            @can('archive.index')
          <a class="sidebar-link btn btn-light" href="{{route('archive.index')}}" aria-expanded="false">
            @endcan
            <span>
              <i class="ti ti-archive"></i>
            </span>
            <span class="hide-menu">الأرشيف</span>
          </a>
        </li>
        @endcan
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          </li>
        @can('formation')
        <li class="sidebar-item" id="myDropdown">
            @can('formation.index')
          <a class="sidebar-link btn btn-light" href="{{route('formation.index')}}" data-bs-toggle="false">
            @endcan
            <span>
              <i class="ti ti-book-2"></i>
            </span>
            <span class="hide-menu">التكوينات</span>
          </a>
        </li>
        @endcan
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          </li>
        @can('stagiaire')
        <li class="sidebar-item"  id="myDropdown">
            @can('stagiaire.index')
          <a class="sidebar-link btn btn-light" href="{{route('stagiaire.index')}}" data-bs-toggle="false">
            @endcan
            <span>
              <i class="ti ti-user"></i>
            </span>
            <span class="hide-menu"> المتدربين</span>
          </a>
        </li>
        @endcan
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          </li>
        @can('attestation.')
        <li class="sidebar-item"  id="myDropdown">
          <a class="sidebar-link btn btn-light" href="#5" data-bs-toggle="dropdown">
            <span>
              <i class="ti ti-file-description"></i>
            </span>
            <span class="hide-menu">مكتبة الوثائق</span>
          </a>
          <ul class="dropdown-menu text-end " style="position: inherit; z-index: 1000;">
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
          </ul>
        </li>
        @endcan
    </ul>
</div>
</nav>






