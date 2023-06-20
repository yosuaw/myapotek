<!DOCTYPE html>
<html lang="en">

<head>
  <title>MyApotek</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('pharma/fonts/icomoon/style.css') }}">

  <link rel="stylesheet" href="{{ asset('pharma/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('pharma/css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('pharma/css/jquery-ui.css') }}">
  <link rel="stylesheet" href="{{ asset('pharma/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('pharma/css/owl.theme.default.min.css') }}">


  <link rel="stylesheet" href="{{ asset('pharma/css/aos.css') }}">

  <link rel="stylesheet" href="{{ asset('pharma/css/style.css') }}">

  <script src="https://unpkg.com/feather-icons"></script>

</head>

<body>

  <div class="site-wrap">
    <div class="site-navbar py-2">
      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="{{ route('home') }}" class="js-logo-clone">MyApotek</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                <li class="{{ Request::is('catalogs') ? 'active' : '' }}"><a href="{{ route('catalogs') }}">Catalog</a></li>
                @can('customer-permission')
                  <li class="{{ Request::is('history') ? 'active' : '' }}"><a href="{{ route('historyTransaction') }}">History</a></li>
                @endcan
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="{{ route('carts') }}"class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              {{-- @if(session('cart'))
                <span class="number">{{ count(session('cart')) }}</span>
              @endif --}}
            </a>
            @if(Auth::user() !== null)
              <span>
                    <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <b class="caret"></b>
              </span>
              <span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="icons-btn d-inline-block bag">
                  @csrf
                    <button type="submit" class="btn" style="background: transparent"><i data-feather="log-out"></i></button>
                </form>
              </span>
              @can('administrator-permission')
                <span>
                  <a href="{{ route('medicines.index') }}" class="btn btn-primary">Dashboard</a>
                </span>
              @endcan
            @else
              <a href="{{ route('login') }}" class="icons-btn d-inline-block bag">
                <span><i data-feather="log-in"></i></span>
              </a>
            @endif
          </div>
        </div>
      </div>
    </div>

    @yield('content')

    <footer class="site-footer">
      <div class="container">
        <div class="row" style="margin-top: 20px">
          <div class="col-md-6 col-lg-6 mb-lg-0">
            <div class="block-7">
              <h3 class="footer-heading mb-4">About Us</h3>
              <p>MyApotek is a place to find your medicine needs. Stay healthy with us !</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 mb-lg-0">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">MQJ8+7Q2, Jl. Tenggilis Mejoyo, Kali Rungkut, Kec. Rungkut, Kota SBY, Jawa Timur 60293</li>
                <li class="phone"><a>+6231-998-522-49</a></li>
                <li class="email">myapotek@gmail.com</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <script src="{{ asset('pharma/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('pharma/js/jquery-ui.js') }}"></script>
  <script src="{{ asset('pharma/js/popper.min.js') }}"></script>
  <script src="{{ asset('pharma/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('pharma/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('pharma/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('pharma/js/aos.js') }}"></script>

  <script src="{{ asset('pharma/js/main.js') }}"></script>
  <script>
      feather.replace()
  </script>

  @yield('javascript')

</body>

</html>
