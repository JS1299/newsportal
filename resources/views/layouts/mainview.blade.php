<!DOCTYPE html>
<html>
<head>
    <title>News Portal</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/design.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/jumbotron/">

    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="jumbotron.css" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>

<header>
    <div id="nav-bar">
        <nav id = "des">
            <ul class="menu">
                <li class="left inline logo">
                    <a href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </li>
                <li class="inline left">{{('Politics')}}</li>
                <li class="inline left">{{('Sports')}}</li>
                <li class="inline left">{{('Criminal')}}</li>
                @guest
                    <li class="nav-item inline right">
                        <a href="{{ route('login') }}">{{ ('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item inline right">
                            <a href="{{ route('register') }}">{{ ('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown right1 inline">
                        {{--                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                        {{--                            @if (auth()->user()->image)--}}
                        {{--                                <img src="{{ asset(auth()->user()->image) }}" style="width: 40px; height: 40px; border-radius: 50%; margin-bottom: 5px;">--}}
                        {{--                            @endif--}}
                        {{--                            {{ Auth::user()->name }} <span class="caret"></span>--}}
                        {{--                        </a>--}}

                        @if (auth()->user()->image)
                            <a id="navbarDropdown" class="nav-link1 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="{{ asset(auth()->user()->image) }}" style="width: 40px; height: 40px; border-radius: 50%; margin-bottom: 5px;">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                        @else
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                        @endif


                        <div id="fix" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile') }}">{{ ('Profile') }}</a>
                            @if(auth()->user()->role == 1 || auth()->user()->role == 2)
                                <a href="{{ route('newArticle') }}" class="dropdown-item">{{ ('Add Article') }}</a>
                            @endif

                            @if(auth()->user()->role == 1)
                                <a class="dropdown-item" href="{{ route('listOfUsers') }}">{{('Users')}}</a>
                                <a class="dropdown-item" href="{{ route('CreateModerator')  }}">{{('Create a new moderator')}}</a>
                            @endif

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ ('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>
    </div>
</header>

@yield('content')
</body>
</html>
