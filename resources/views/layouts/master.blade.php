<DOCTYPE html>
    <html>

    <head>
         <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css"> -->
        <title>Blogs CRUD</title>
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">

        <link rel="stylesheet" href="../css/colors.css">
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/components.css')}}">
        <link rel="stylesheet" href="{{asset('css/jquery.fileuploader-theme-dragdrop.css')}}">
        <!-- <link rel="stylesheet" href="{{asset('css/color.css')}}"> -->
        <link rel="stylesheet" href="{{asset('css/core.css')}}">
        <link rel="stylesheet" href="{{asset('css/icons/icomoon/styles.css')}}">



        <script type="text/javascript" src="{{asset('js/pace.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/uploader_bootstrap.js')}}"></script>
        <script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/select2.min.js')}}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.7.0/ckeditor.js"></script>
        <!-- <script type="text/javascript" src="{{asset('js/editor_ckeditor.js')}}"></script> -->
        <script type="text/javascript" src="{{asset('js/fileinput.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/blockui.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/duallistbox.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/form_dual_listboxes.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap_multiselect.js')}}"></script>

        <script type="text/javascript" src="{{asset('js/tagsinput.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/tokenfield.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/prism.min.js')}}"></script>

        <!-- <script type="text/javascript" src="{{asset('js/typeahead.min.js')}}"></script> -->
        <!-- <script type="text/javascript" src="{{asset('js/app2.js')}}"></script> -->






    </head>
    <body>

    <div class="page-header">
        @yield('header')
    </div>
    <div class="container">


    </div>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

    </div>
    @yield('content')

    </body>

    </html>