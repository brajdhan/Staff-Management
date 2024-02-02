<!-- Navbar -->
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">

  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="bx bx-menu bx-sm"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    {{-- <div class="navbar-nav align-items-center">
      <div class="nav-item d-flex align-items-center">
        <i class="bx bx-search fs-4 lh-0"></i>
        <input
          type="text"
          class="form-control border-0 shadow-none"
          placeholder="Search..."
          aria-label="Search..."
        />
      </div>
    </div> --}}
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto">

      <!-- User -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar avatar-online">
            <div class="d-inline-block bg-label-primary rounded-circle overflow-hidden">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 400" width="40" height="40">
                <path fill="#d9e4e8" d="M448,480a19.22,19.22,0,0,1-19.2,19.2H83.2A19.22,19.22,0,0,1,64,480c0-81.73,61.6-149.33,140.8-158.84V269.58a115.33,115.33,0,0,1-64-103.18V128a115.2,115.2,0,1,1,230.4,0v38.4a115.33,115.33,0,0,1-64,103.18v51.58C386.4,330.67,448,398.27,448,480Z" />
                <path fill="#17292d" style="opacity: 0.14;" d="M256,0a127.82,127.82,0,0,0-32,4.2A127.94,127.94,0,0,1,320,128v38.4a127.94,127.94,0,0,1-96,123.8A127.55,127.55,0,0,0,384,166.4V128A128,128,0,0,0,256,0Z" />
                <path fill="#141f38" d="M320,310.18V277.27A128,128,0,0,0,384,166.4V128a128,128,0,0,0-256,0v38.4a128,128,0,0,0,64,110.87v32.91A172.84,172.84,0,0,0,51.2,480a32,32,0,0,0,32,32H428.8a32,32,0,0,0,32-32A172.84,172.84,0,0,0,320,310.18ZM153.6,166.4V128a102.4,102.4,0,1,1,204.8,0v38.4a102.4,102.4,0,0,1-204.8,0ZM256,294.4a127.94,127.94,0,0,0,38.4-5.86v29.77l-38.4,23-38.4-23V288.54A127.94,127.94,0,0,0,256,294.4Zm172.8,192H83.2a6.41,6.41,0,0,1-6.4-6.4c0-71.72,51.56-131.61,119.56-144.58L256,371.2l59.64-35.78c68,13,119.56,72.86,119.56,144.58A6.41,6.41,0,0,1,428.8,486.4Z" />
              </svg>
            </div>
            {{-- <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto " /> --}}
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="#">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar avatar-online">
                    <div class="d-inline-block bg-label-primary rounded-circle overflow-hidden">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 400" width="40" height="40">
                        <path fill="#d9e4e8" d="M448,480a19.22,19.22,0,0,1-19.2,19.2H83.2A19.22,19.22,0,0,1,64,480c0-81.73,61.6-149.33,140.8-158.84V269.58a115.33,115.33,0,0,1-64-103.18V128a115.2,115.2,0,1,1,230.4,0v38.4a115.33,115.33,0,0,1-64,103.18v51.58C386.4,330.67,448,398.27,448,480Z" />
                        <path fill="#17292d" style="opacity: 0.14;" d="M256,0a127.82,127.82,0,0,0-32,4.2A127.94,127.94,0,0,1,320,128v38.4a127.94,127.94,0,0,1-96,123.8A127.55,127.55,0,0,0,384,166.4V128A128,128,0,0,0,256,0Z" />
                        <path fill="#141f38" d="M320,310.18V277.27A128,128,0,0,0,384,166.4V128a128,128,0,0,0-256,0v38.4a128,128,0,0,0,64,110.87v32.91A172.84,172.84,0,0,0,51.2,480a32,32,0,0,0,32,32H428.8a32,32,0,0,0,32-32A172.84,172.84,0,0,0,320,310.18ZM153.6,166.4V128a102.4,102.4,0,1,1,204.8,0v38.4a102.4,102.4,0,0,1-204.8,0ZM256,294.4a127.94,127.94,0,0,0,38.4-5.86v29.77l-38.4,23-38.4-23V288.54A127.94,127.94,0,0,0,256,294.4Zm172.8,192H83.2a6.41,6.41,0,0,1-6.4-6.4c0-71.72,51.56-131.61,119.56-144.58L256,371.2l59.64-35.78c68,13,119.56,72.86,119.56,144.58A6.41,6.41,0,0,1,428.8,486.4Z" />
                      </svg>
                    </div>
                  </div>
                </div>

                @php
                $roles = auth()->user()->getRoleNames()->toArray();
                $roleName = $roles[0];
                @endphp
                <div class="flex-grow-1">
                  <span class="fw-semibold d-block">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                  <small class="text-muted">{{ $roleName }}</small>
                </div>
              </div>
            </a>
          </li>
          {{-- <li>
            <div class="dropdown-divider"></div>
          </li> --}}
          {{-- <li>
            <a class="dropdown-item" href="#">
              <i class="bx bx-user me-2"></i>
              <span class="align-middle">My Profile</span>
            </a>
          </li> --}}
          {{-- <li>
            <a class="dropdown-item" href="#">
              <i class="bx bx-cog me-2"></i>
              <span class="align-middle">Settings</span>
            </a>
          </li> --}}
          {{-- <li>
            <a class="dropdown-item" href="#">
              <span class="d-flex align-items-center align-middle">
                <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                <span class="flex-grow-1 align-middle">Billing</span>
                <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
              </span>
            </a>
          </li> --}}
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>

            {!! Form::open(array('route' => 'logout','method'=>'POST')) !!}

            <button class="dropdown-item" type="submit"><i class="bx bx-power-off me-2"></i> Log Out</a></button>

            {!! Form::close() !!}


          </li>
        </ul>
      </li>
      <!--/ User -->
    </ul>
  </div>
</nav>

<!-- / Navbar -->