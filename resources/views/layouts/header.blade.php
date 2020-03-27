<div class="logo-menu">
  <div class="container d-flex justify-content-between align-items-center">
    <h1 class="text-success">Text To Speech</h1>
  </div>
</div>

@php
  $routeName = Route::currentRouteName();
  $textToSpeechActive = ($routeName =='textToSpeech')? 'active' : '';
@endphp
{{--  add active in a.nav-link for active menu  --}}
<div class="navigation-bar">
  <div class="container">
    <div class="row">
      <nav class="navbar navbar-expand-sm d-flex justify-content-between">
        <button class="navbar-toggler" type="button" onclick="menuMobile(this)">
          <span class="bar1"></span>
          <span class="bar2"></span>
          <span class="bar3"></span>
        </button>

        {{--right bar--}}
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link {{ $textToSpeechActive }}" href="/">Convert</a>
            </li>
          </ul>
        </div>

      </nav>
    </div>
  </div>
</div>

<style>
  /*navigation bar*/
  .navigation-bar {
    background-color: #5aa0a0; /* nav background color */
    width: 100%;
  }

  nav.navbar {
    border: 0;
    border-radius: 0;
    clear: both;
    margin: 0 auto;
    min-height: auto;
    width: 100%;
    padding-left: 0px;
  }

  .navbar-toggler {
    display: none;
  }

  .navbar-nav {
    list-style: none;
    padding-left: 0;
  }

  .navbar-nav li {
    float: none;
    padding: 0px 10px; /* nav item padding */
    display: inline-block;
  }

  .navbar-nav li a {
    color: #fff; /* nav item color */
    display: inline-block;
    padding: 8px 25px;
    font-weight: bold;
    line-height: normal;
  }

  .navbar-nav li a:hover, .navbar-nav li a.active {
    background: #72bab9; /* nav hover, active background */
    border-radius: 20px;
    text-decoration: none;
  }

  @media only screen and (max-width: 570px) {
    nav.navbar {
      padding-left: 20px;
    }

    .navbar-toggler, .collapse {
      display: block;
    }

    .collapse {
      display: none;
    }

    .navbar-toggler {
      border-radius: 5px;
      float: right;
      margin-right: 15px;
      border: 1px #fff solid;
      background: transparent;
      padding: 0px 5px;
      outline: none;
    }

    .bar1, .bar2, .bar3 {
      background-color: #fff;
      display: block;
      margin: 6px 0;
      transition: 0.4s;
      width: 30px;
      height: 2px;
    }

    .navbar-collapse {
      background: #5aa0a0;
      position: absolute;
      top: 100%;
      float: left;
      left: 0;
      width: 100%;
      z-index: 99;
    }

    .navbar-nav {
      padding: 0;
      padding-top: 5px;
      margin: 0 auto;
    }

    .navbar-nav li {
      border-top: 1px #fff solid; /* border each item */
      border-radius: 0;
      display: block;
      line-height: normal;
      margin: 0 auto;
      padding: 0px;
      width: 100%;
    }

    .navbar-nav li a:not(.active) {
      display: block;
      padding: 6px 22px;
      margin: 0 auto;
      line-height: 32px;
      text-align: left;
      width: 100%;
      /*background-color: red;*/
    }

    .nav-item:hover{
      background: #72bab9;
      border-radius: 0px;
      text-decoration: none;
    }
    .navbar-nav li a.active {
      background: #72bab9;
      border-radius: 0px;
      text-decoration: none;
      display: block;
      padding: 6px 22px;
      margin: 0 auto;
      line-height: 32px;
      text-align: left;
      width: 100%;
    }
  }
</style>

<script>
  function menuMobile(event) {
    event.classList.toggle("change");
  }
  $(document).ready(function () {
    $(".navbar-toggler").click(function () {
      $(".collapse").slideToggle(300);
    });
  });
</script>
