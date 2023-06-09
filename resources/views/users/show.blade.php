@extends('layouts.app')

@section('native-styles')
  <link type="text/css" rel="stylesheet" href="{{ asset('plugins/materialize/css/materialize.min.css') }}" />
  <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link href="{{ asset('plugins/weather-icons-master/css/weather-icons.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('css/alpha.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/custom.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
  <div>
    <div class="row">
      <div class="col s12 m4 l3">
        <div class="card">
          <div class="card-content center-align">
            <img src="{{ Storage::url($user->additional->photo_profile) }}" class="responsive-img profile-user circle" width="110px" height="110px" alt="">
            <p class="m-t-lg flow-text">{{ $user->all_name }}</p>
            <div class="chip m-t-sm deep-orange white-text">Asesor</div>
          </div>
        </div>
        <div class="card">
          <div class="card-content">
            <span class="card-title">Informacion</span>
            <ul class="list-users">
              <li class="info-item-user valign-wrapper">
                <i class="material-icons">email</i><a href="mailto:{{ $user->email }}"><span>{{ $user->email }}</span></a>  </li>
              <li class="info-item-user valign-wrapper">
                <i class="material-icons">phone</i><span>{{ $user->additional->phone }}</span>
              </li>
              <li class="info-item-user valign-wrapper">
                <i class="material-icons">person_pin</i><span>ID User: <b>{{ $user->id }}</b></span>
              </li>
            </ul>
          </div>
        </div>
        <!-- componente -->
        <div class="card">
         <livewire:users.change-active :user="$user" />
        </div>
        <!-- componente -->
        <!-- componente -->
        <div class="card">
          <livewire:users.reset-password :user="$user" />
        </div>
        <!-- componente -->
      </div>

      <div class="col s12 l9">
        <div class="card">
         <livewire:tracking-user.search-trackings/>
        </div>
        <div class="card">
          <livewire:tracking-user.user-trackings :user="$user"/>
        </div>
      </div>


    </div>

  </div>
@endsection
@section('native-scripts')
  <!-- Javascripts -->
  <script src="{{ asset('plugins/jquery/jquery-2.2.0.min.js')}}"></script>
  <script src="{{ asset('plugins/materialize/js/materialize.min.js')}}"></script>
  <script src="{{ asset('plugins/material-preloader/js/materialPreloader.min.js')}}"></script>

  <script src="{{ asset('js/alpha.min.js')}}"></script>
@endsection
@push('scripts')
@endpush