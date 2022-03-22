<aside id="slide-out" class="side-nav white fixed">
  <div class="side-nav-wrapper">
    <div class="sidebar-profile">
      <div class="sidebar-profile-image">
        {{--<img src="{{ Auth::user()->additional->photo_profile  }}" alt="">--}}
        <img src="{{ Auth::user()->additional->photo_profile  }}" class="circle" alt="">
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
        <li class="no-padding">
          <a class="waves-effect waves-grey"><i class="material-icons">done</i>Sent Mail</a>
        </li>
        <li class="no-padding">
          <a class="waves-effect waves-grey"><i class="material-icons">history</i>History<span class="new grey lighten-1 badge">3 new</span></a>
        </li>
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
      <li class="no-padding active"><a class="waves-effect waves-grey active" href="{{ route('index') }}">
          <i class="material-icons">settings_input_svideo</i>
          Inicio
        </a>
      </li>
      @role('administrador')
        <li class="no-padding">
          <a class="collapsible-header waves-effect waves-grey">
            <i class="material-icons">apps</i>Usuarios<i class="nav-drop-icon material-icons">keyboard_arrow_right</i>
          </a>
          <div class="collapsible-body">
            <ul>
              <li><a href="{{ route('users.create') }}"> Crear </a></li>
              <li><a href="/contacts"> Listado </a></li>
            </ul>
          </div>
        </li>
      @endrole
      <li class="no-padding">
        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i><i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
        <div class="collapsible-body">
          <ul>
            <li><a href="{{ route('projects.index') }}">Proyectos</a></li>
            <li><a href="/contacts">Contactos</a></li>
          </ul>
        </div>
      </li>
      <li class="no-padding">
        <a class="waves-effect waves-grey" href="charts.html"><i class="material-icons">trending_up</i>Charts</a>
      </li>
    </ul>
    <div class="footer">
      <p class="copyright">giganube ©</p>
    </div>
  </div>
</aside>