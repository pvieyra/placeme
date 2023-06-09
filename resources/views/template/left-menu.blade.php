<aside id="slide-out" class="side-nav white fixed">
  <div class="side-nav-wrapper">
    <div class="sidebar-profile">
      <div class="sidebar-profile-image">
        <img src="{{ Storage::url(Auth::user()->additional->photo_profile) }}" class="circle" alt="user photo profile">
      </div>
      <div class="sidebar-profile-info">
        <a href="javascript:void(0);" class="account-settings-link">
          <p>{{ Auth::user()->all_name }}</p>
          <span>{{ Auth::user()->email }}<i class="material-icons right">arrow_drop_down</i></span>
        </a>
      </div>
    </div>
    <div class="sidebar-account-settings">
      <ul>
        <li class="divider"></li>
        <li class="no-padding">
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
										document.getElementById('logout-form').submit();" class="waves-effect waves-grey">
            <i class="material-icons">exit_to_app</i>
            {{ __('Cerrar Sesión')}}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            {{ csrf_field() }}
          </form>
        </li>
      </ul>
    </div>
    <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
      <li class="no-padding {{ ! Route::is('index')?:'active' }}">
        <a class="waves-effect waves-grey" href="{{ route('index') }}">
          <i class="material-icons">home</i>
          Inicio
        </a>
      </li>
      @role('administrador')
        <li class="no-padding ">
          <a class="collapsible-header waves-effect waves-grey {{ (request()->is('usuario*')) ? 'active' : '' }}">
            <i class="material-icons">people</i>Usuarios<i class="nav-drop-icon material-icons">keyboard_arrow_right</i>
          </a>
          <div class="collapsible-body">
            <ul>
              <li><a class="{{ ! Route::is('users.index')?:'active-page' }}" href="{{ route('users.index') }}"> Ver Usuarios</a></li>
              <li><a class="{{ ! Route::is('users.create')?:'active-page' }}" href="{{ route('users.create') }}"> Crear Usuarios </a></li>
            </ul>
          </div>
        </li>
      @endrole
      <li class="no-padding">
        <!-- agregar clase active-->
        <a class="collapsible-header waves-effect waves-grey {{ (request()->is('seguimiento*')) ? 'active' : '' }} ">Seguimientos<i class="material-icons">apps</i><i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
        <div class="collapsible-body">
          <ul>
            @role('asesor')
            <li><a class="{{ ! Route::is('trackings.create')?:'active-page' }}" href="{{ route('trackings.create') }}">Crear Seguimiento</a></li>
            <li><a class="{{ ! Route::is('trackings.index')?:'active-page' }}" href="{{ route('trackings.index') }}">Ver Seguimientos</a></li>
            @endrole
            @role('administrador')
            <!-- mostrar otra vista de seguimientos a administradores -->
            <li><a class="{{ ! Route::is('trackings.index-admin')?:'active-page' }}" href="{{ route('trackings.index-admin') }}">Ver Seguimientos</a></li>
            <li><a class="{{ ! Route::is('trackings.duplicate')?:'active-page' }}" href="{{ route('trackings.duplicate') }}">Duplicados recientes</a></li>
            <li><a class="{{ ! Route::is('tracking.all-duplicates')?:'active-page' }}"  href="{{ route('tracking.all-duplicates') }}">Todos los duplicados</a></li>
            @endrole
          </ul>
        </div>
      </li>
      @role('administrador')
      <li class="no-padding">
        <a class="collapsible-header waves-effect waves-grey {{ (request()->is('propiedad*')) ? 'active' : '' }}">Propiedades<i class="material-icons">business</i><i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
        <div class="collapsible-body">
          <ul>
            <li><a class="{{ ! Route::is('buildings.index')?:'active-page' }}" href="{{ route('buildings.index') }}">Ver Propiedades</a></li>
          </ul>
        </div>
      </li>
      @endrole
      @role('administrador')
      <li class="no-padding">
        <a class="collapsible-header waves-effect waves-grey {{ (request()->is('enlace*')) ? 'active' : '' }}">Enlaces<i class="material-icons">link</i><i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
        <div class="collapsible-body">
          <ul>
            <li><a class="{{ ! Route::is('link.index')?:'active-page' }}" href="{{ route('link.index') }}">Ver Enlaces</a></li>
          </ul>
        </div>
      </li>
      @endrole

      @role('administrador')
      <li class="no-padding">
        <a class="collapsible-header waves-effect waves-grey {{ (request()->is('reporte*')) ? 'active' : '' }}">Reportes<i class="material-icons">assessment</i><i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
        <div class="collapsible-body">
          <ul>
            <li><a class="{{ ! Route::is('trackings-report.index')?:'active-page' }}" href="{{ route('trackings-report.index') }}">Por seguimientos </a></li>
            <li><a class="{{ ! Route::is('users-trackings-report.index')?:'active-page' }}" href="{{ route('users-trackings-report.index') }}">Por asesor </a></li>
            <li><a class="{{ ! Route::is('building-trackings-report.index')?:'active-page' }}" href="{{ route('building-trackings-report.index') }}">Por Propiedad </a></li>
          </ul>
        </div>
      </li>
      @endrole
    </ul>
    <div class="footer">
      <img src="{{ asset("images/logo.jpeg") }}" alt="Place Me! Portal" width="110" height="60">
    </div>
  </div>
</aside>