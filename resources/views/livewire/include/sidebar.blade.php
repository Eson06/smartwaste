
<aside class="navbar navbar-vertical navbar-expand-lg d-print-none  " data-bs-theme="dark">

    <div class="container-fluid" >
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <h1 class="navbar-brand navbar-brand-autodark">
        <a href="#" class="f-5">
          Smart Waste
        </a>
      </h1>
      <div class="navbar-nav flex-row d-lg-none">

        <div class="nav-item dropdown">
          <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
            <span class="avatar avatar-sm rounded-circle" style="background-image: url({{asset('images/smartwaste_logo.png')}})"></span>
            <div class="d-none d-xl-block ps-2">
                <div>{{ auth('web')->User()->name }}</div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

            <a href="#" class="dropdown-item" wire:click.prevent="LogoutHandler()">Log Out</a>
          </div>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="sidebar-menu" >
        <ul class="navbar-nav pt-lg-3">

            <li class="nav-item {{ Route::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard')}}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <svg class="icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 4h6v8h-6z"></path>
                            <path d="M4 16h6v4h-6z"></path>
                            <path d="M14 12h6v8h-6z"></path>
                            <path d="M14 4h6v4h-6z"></path>
                        </svg>
                    </span>
                  <span class="nav-link-title">
                    Dashboard
                  </span>
                </a>
            </li>

            @can ('ResidentRole', '/App/Models/User')
            <li class="hr-text m-2">Resident Panel</li>

            <li class="nav-item {{ Route::is('resident.home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('resident.home')}}" wire:navigate >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <svg class="icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 4h6v8h-6z"></path>
                            <path d="M4 16h6v4h-6z"></path>
                            <path d="M14 12h6v8h-6z"></path>
                            <path d="M14 4h6v4h-6z"></path>
                        </svg>
                    </span>
                  <span class="nav-link-title">
                    home
                  </span>
                </a>
            </li>

            <li class="nav-item {{ Route::is('resident.calendar') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('resident.calendar')}}" wire:navigate >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <svg class="icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M4 4h6v8h-6z"></path>
                          <path d="M4 16h6v4h-6z"></path>
                          <path d="M14 12h6v8h-6z"></path>
                          <path d="M14 4h6v4h-6z"></path>
                      </svg>
                  </span>
                <span class="nav-link-title">
                  Calendar
                </span>
              </a>
          </li>

          <li class="nav-item {{ Route::is('resident.report') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('resident.report')}}" wire:navigate >
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg class="icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 4h6v8h-6z"></path>
                        <path d="M4 16h6v4h-6z"></path>
                        <path d="M14 12h6v8h-6z"></path>
                        <path d="M14 4h6v4h-6z"></path>
                    </svg>
                </span>
              <span class="nav-link-title">
                Report
              </span>
            </a>
        </li>

        <li class="nav-item {{ Route::is('resident.guideline') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('resident.guideline')}}" wire:navigate >
              <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg class="icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M4 4h6v8h-6z"></path>
                      <path d="M4 16h6v4h-6z"></path>
                      <path d="M14 12h6v8h-6z"></path>
                      <path d="M14 4h6v4h-6z"></path>
                  </svg>
              </span>
            <span class="nav-link-title">
              Guideline
            </span>
          </a>
      </li>

      <li class="nav-item {{ Route::is('resident.setting') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('resident.setting')}}" wire:navigate >
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg class="icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 4h6v8h-6z"></path>
                    <path d="M4 16h6v4h-6z"></path>
                    <path d="M14 12h6v8h-6z"></path>
                    <path d="M14 4h6v4h-6z"></path>
                </svg>
            </span>
          <span class="nav-link-title">
            Setting
          </span>
        </a>
    </li>
@endcan

    @can ('AdminRole', '/App/Models/User')
            <li class="hr-text m-2">Admin Panel</li>

            <li class="nav-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
              <a  href="{{ route('admin.dashboard')}}" class="nav-link "  wire:navigate >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <svg class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                          <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                          <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                          <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                          <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                          <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                      </svg>
                  </span>
              <span class="nav-link-title">
                  Dashboard
              </span>
              </a>
          </li>

          <li class="nav-item {{ Route::is('admin.schedule') ? 'active' : '' }}">
            <a  href="{{ route('admin.schedule')}}" class="nav-link "  wire:navigate >
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                        <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                    </svg>
                </span>
            <span class="nav-link-title">
                Schedule
            </span>
            </a>
        </li>

        <li class="nav-item {{ Route::is('admin.driver') ? 'active' : '' }}">
            <a  href="{{ route('admin.driver')}}" class="nav-link "  wire:navigate >
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                        <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                    </svg>
                </span>
            <span class="nav-link-title">
                Driver
            </span>
            </a>
        </li>

        <li class="nav-item {{ Route::is('admin.report') ? 'active' : '' }}">
          <a  href="{{ route('admin.report')}}" class="nav-link "  wire:navigate >
              <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                      <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                      <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                      <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                      <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                      <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                  </svg>
              </span>
          <span class="nav-link-title">
              Report
          </span>
          </a>
      </li>

      <li class="nav-item {{ Route::is('admin.user-management') ? 'active' : '' }}">
        <a  href="{{ route('admin.user-management')}}" class="nav-link "  wire:navigate >
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <svg class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                    <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                    <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                    <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                    <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                    <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                </svg>
            </span>
        <span class="nav-link-title">
            User Management
        </span>
        </a>
    </li>

    {{-- <li class="nav-item {{ Route::is('admin.setting') ? 'active' : '' }}">
      <a  href="{{ route('admin.setting')}}" class="nav-link "  wire:navigate >
          <span class="nav-link-icon d-md-none d-lg-inline-block">
              <svg class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                  <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                  <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                  <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                  <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                  <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
              </svg>
          </span>
      <span class="nav-link-title">
          Setting
      </span>
      </a>
  </li> --}}
  @endcan

  @can ('DriverRole', '/App/Models/User')
  <li class="hr-text m-2">Driver Panel</li>

  <li class="nav-item {{ Route::is('driver.dashboard') ? 'active' : '' }}">
    <a  href="{{ route('driver.dashboard')}}" class="nav-link "  wire:navigate >
        <span class="nav-link-icon d-md-none d-lg-inline-block">
            <svg class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
            </svg>
        </span>
    <span class="nav-link-title">
        Dashboard
    </span>
    </a>
</li>

<li class="nav-item {{ Route::is('driver.collection') ? 'active' : '' }}">
  <a  href="{{ route('driver.collection')}}" class="nav-link "  wire:navigate >
      <span class="nav-link-icon d-md-none d-lg-inline-block">
          <svg class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
              <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
              <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
              <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
              <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
              <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
          </svg>
      </span>
  <span class="nav-link-title">
     Collection
  </span>
  </a>
</li>

<li class="nav-item {{ Route::is('driver.schedule') ? 'active' : '' }}">
  <a  href="{{ route('driver.schedule')}}" class="nav-link "  wire:navigate >
      <span class="nav-link-icon d-md-none d-lg-inline-block">
          <svg class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
              <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
              <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
              <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
              <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
              <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
          </svg>
      </span>
  <span class="nav-link-title">
     Schedule
  </span>
  </a>
</li>

{{-- <li class="nav-item {{ Route::is('driver.report') ? 'active' : '' }}">
  <a  href="{{ route('driver.report')}}" class="nav-link "  wire:navigate >
      <span class="nav-link-icon d-md-none d-lg-inline-block">
          <svg class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
              <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
              <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
              <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
              <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
              <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
          </svg>
      </span>
  <span class="nav-link-title">
      Report
  </span>
  </a>
</li> --}}

<li class="nav-item {{ Route::is('driver.setting') ? 'active' : '' }}">
  <a  href="{{ route('driver.setting')}}" class="nav-link "  wire:navigate >
      <span class="nav-link-icon d-md-none d-lg-inline-block">
          <svg class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
              <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
              <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
              <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
              <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
              <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
          </svg>
      </span>
  <span class="nav-link-title">
      Settings
  </span>
  </a>
</li>
@endcan

        </ul>
      </div>
    </div>
  </aside>




