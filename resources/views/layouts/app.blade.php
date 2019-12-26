<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>بیمه چی</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modify.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    @yield('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    بیمه چی
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li>
                            <a href="/home" class="fas fa-tachometer-alt">
                                <span>داشبورد</span>
                            </a>
                        </li>
                        <li>
                            <a href="/home/installers" class="fas fa-suitcase"></a>
                        </li>
                        <li>
                            <a href="/home/sellers" class="fas fa-store-alt"></a>
                        </li>
                        <li>
                            <a href="/home/customers" class="fas fa-users"></a>
                        </li>
                        <li>
                            <a href="/home/orders" class="fas fa-shopping-basket"></a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    @if(sizeof(fetchNotification(Auth::user()->id)) > 0)
                                        <i class="badge badge-danger" style="font-family: initial;">
                                            {{sizeof(fetchNotification(Auth::user()->id))}}
                                        </i>
                                    @endif
                                    <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @foreach(fetchNotification(Auth::user()->id) as $notification)
                                        <a class="dropdown-item" style="background: #e1e1e1;margin-bottom: 3px;">
                                            {{ $notification->message }}
                                        </a>
                                    @endforeach
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('خروج') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-3 sidebar-menu">
                        <ul class="nav flex-column">
                              <li class="nav-item">
                                <a class="nav-link active" href="/home">
                                    <i class="fas fa-tachometer-alt" style="color: #6c5ce7;"></i>
                                    داشبورد
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-users" style="color: #e84393"></i>
                                    مدیریت کاربران
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-file-alt" style="color: #d63031"></i>
                                    صدور بیمه نامه جدید
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-chalkboard-teacher" style="color: #e17055"></i>
                                    بازاریابان
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="/home/insurences">
                                    <i class="fas fa-sliders-h" style="color: #474787"></i>
                                    تنظیمات بیمه ها
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="/home/settings">
                                    <i class="fas fa-cogs" style="color: #00b894"></i>
                                    تنظیمات
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link disabled" href="#">
                                    <i class="fas fa-shopping-basket" style="color: #2980b9"></i>
                                    خرید اشتراک
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-chart-bar" style="color: #009432"></i>
                                    گزارشات خرید
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="/home/profile">
                                    <i class="fas fa-user" style="color: #8e44ad"></i>
                                    پروفایل کاربری
                                </a>
                              </li>
                            </ul>
                    </div>
                    <div class="col-md-9">
                        @if(Auth::user()->code == null || Auth::user()->phone == null)
                            <div class="alert alert-danger" role="alert">
                              پروفایل شما تکمیل نشده است، نسبت به تکمیل آن اقدام کنید !
                            </div>
                        @endif
                        @if(!Auth::user()->active)
                            <div class="alert alert-warning" role="alert">
                              کاربر عزیز اکانت شما در خال بررسی می باشد و هنوز به مرحله ی تایید رسیده است
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    @if(Session::has('success'))
      <script type="text/javascript">
          swal("{{ Session::get('success') }}", {
            icon: "success",
            buttons: false
          });
      </script>
    @endif
    @if(Session::has('error'))
      <script type="text/javascript">
          swal("{{ Session::get('error') }}", {
            icon: "error",
            buttons: false
          });
      </script>
    @endif
    @yield('script')
    @if ($errors->any())
        <script type="text/javascript">
          swal("ورودی های خود را چک کنید ، همه ی وروردی ها مورد نیاز است", {
            icon: "error",
            buttons: false
          });
      </script>
    @endif
    @yield('script')
</body>
</html>
