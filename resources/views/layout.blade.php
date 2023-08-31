<!doctype html>
<html lang="zh-TW">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{$webData['webConfig'][2]->tittle}}">
        <meta name="keywords" content="{{$webData['webConfig'][1]->tittle}}">
        <title>@yield('title'){{$webData['webConfig'][0]->tittle}}</title>
        <link rel="stylesheet" href="{{$webData['webConfig'][13]->tittle}}css/bulma.css">
        <link rel="stylesheet" href="{{$webData['webConfig'][13]->tittle}}css/fontawesome-all.css">
        <link rel="stylesheet" href="{{$webData['webConfig'][13]->tittle}}css/locomotive-scroll.css">
        <link rel="stylesheet" href="{{$webData['webConfig'][13]->tittle}}css/kursor.css">
        <link rel="stylesheet" href="{{$webData['webConfig'][13]->tittle}}codes/styles/prism.css">
        <link rel="icon" data-rh="true" href="{{asset('favicon.ico')}}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.0/gsap.min.js"></script>
        <script src="{{$webData['webConfig'][13]->tittle}}js/barba.umd.js"></script>
        <script src="{{$webData['webConfig'][13]->tittle}}js/locomotive-scroll.min.js"></script>
        <script src="{{$webData['webConfig'][13]->tittle}}js/jquery-3.3.1.min.js"></script>
        <script src="{{$webData['webConfig'][13]->tittle}}js/lottie-player.js"></script>
        <script src="{{$webData['webConfig'][13]->tittle}}codes/prism.js"></script>
        <script src="{{$webData['webConfig'][13]->tittle}}js/kursor.js"></script>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3826338280068687"
        crossorigin="anonymous"></script>
        <script src="{{$webData['webConfig'][13]->tittle}}js/typed.umd.js"></script>
        <script src="{{$webData['webConfig'][13]->tittle}}js/contact.js"></script>
        <script src="{{$webData['webConfig'][13]->tittle}}js/index.js"></script>
        <script src="{{$webData['webConfig'][13]->tittle}}js/layout.js"></script>
        <script>window.addEventListener('load', layoutInit);</script>
        {!! $webData['webConfig'][4]->tittle !!}
    </head>
    <body class="has-navbar-fixed-top" data-barba="wrapper">
        <nav class="navbar is-white is-fixed-top" role="navigation" aria-label="main navigation">
            <div class="container is-fluid pt-5">
                <div class="navbar-brand">
                    <a class="navbar-item" href="{{$webData['webConfig'][13]->tittle}}">
                        <img alt="logo" src="{{$webData['webConfig'][13]->tittle}}{{$webData['webConfig'][5]->tittle}}">
                    </a>
                    <!--MibileNavbar -->
                    <div class="navbar-item navbar-toggle is-navbar-toggle-close is-mobile" style="margin-left: auto; margin-right: -0.75rem">
                        <a class="navbar-link is-arrowless title is-2">
                            <svg id="MenuIcon" width="69px" height="69px" viewBox="0 0 69 69" xmlns="http://www.w3.org/2000/svg">
                                <line id="mil1" x1="15" y1="41" x2="69" y2="41" stroke="#263A29" stroke-width="1"></line>
                                <line id="mil2" x1="15" y1="53" x2="69" y2="53" stroke="#263A29" stroke-width="1"></line>
                                <line id="mil3" x1="15" y1="65" x2="69" y2="65" stroke="#263A29" stroke-width="1"></line>
                            </svg>
                        </a>
                    </div>
                    <!-- END -->
                </div>
                <div id="MainNavbar" class="navbar-menu">
                    <div class="navbar-start">
                    </div>
                    <div class="navbar-end">
                        <div class="navbar-item navbar-toggle is-navbar-toggle-close">
                            <a class="navbar-link is-arrowless title is-2">
                                <svg id="MenuIcon" width="69px" height="69px" viewBox="0 0 69 69" xmlns="http://www.w3.org/2000/svg">
                                    <line id="mil1" x1="15" y1="41" x2="69" y2="41" stroke="#263A29" stroke-width="1"></line>
                                    <line id="mil2" x1="15" y1="53" x2="69" y2="53" stroke="#263A29" stroke-width="1"></line>
                                    <line id="mil3" x1="15" y1="65" x2="69" y2="65" stroke="#263A29" stroke-width="1"></line>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="fullMenu">
            <div class="container is-max-desktop" style="margin-top:8.5rem;">
                <div class="columns is-variable is-8">
                    <div class="column is-8">
                        <div class="block">
                            <p class="is-size-5 has-text-left has-text-centered-mobile">
                                <span class="has-text-link"><i class="fas fa-quote-left"></i></span><span id="typed"></span><span class="has-text-link"><i class="fas fa-quote-right"></i></span>
                            </p>
                        </div>
                        <div class="block has-text-left has-text-centered-mobile">
                            @if(strlen($webData['webConfig'][22]->tittle) > 0)
                                <a href="{{$webData['webConfig'][22]->tittle}}" target="_blank">
                                    <button class="button is-twitter is-outlined is-medium is-rounded ml-1 mr-1">
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                </a>
                            @endif
                            @if(strlen($webData['webConfig'][21]->tittle) > 0)
                                <a href="{{$webData['webConfig'][21]->tittle}}" target="_blank">
                                    <button class="button is-instagram is-medium is-rounded ml-1 mr-1">
                                        <i class="fab fa-instagram-square"></i>
                                    </button>
                                </a>
                            @endif
                            @if(strlen($webData['webConfig'][20]->tittle) > 0)
                                <a href="{{$webData['webConfig'][20]->tittle}}" target="_blank">
                                    <button class="button is-facebook is-outlined is-medium is-rounded ml-1 mr-1">
                                        <i class="fab fa-facebook"></i>
                                    </button>
                                </a>
                            @endif
                            @if(strlen($webData['webConfig'][23]->tittle) > 0)
                                <a href="{{$webData['webConfig'][23]->tittle}}" target="_blank">
                                    <button class="button is-applepodcast is-outlined is-medium is-rounded ml-1 mr-1">
                                        <i class="fab fa-apple"></i>
                                    </button>
                                </a>
                            @endif
                            @if(strlen($webData['webConfig'][24]->tittle) > 0)
                                <a href="{{$webData['webConfig'][24]->tittle}}" target="_blank">
                                    <button class="button is-outlined is-white is-medium is-rounded ml-1 mr-1">
                                        <i class="fab fa-google"></i>
                                    </button>
                                </a>
                            @endif
                        </div>
                        <hr />
                        <div class="block has-text-left has-text-centered-mobile">
                            @foreach($webData['allButtonNav'] as $bn)
                            <a href="
                                {{ (\Illuminate\Support\Str::limit($bn->URL, 4, $end='')=='http' || \Illuminate\Support\Str::limit($bn->URL, 4, $end='')=='mail') ? $bn->URL : $webData['webConfig'][13]->tittle.$bn->URL}}"
                                class="is-size-6 ml-1 mr-1"
                            >
                                {{$bn->NavigateName}}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="column">
                        <!--Dynamic System Gen-->
                        @foreach($webData['allNav'] as $Nav)
                        @if(\Illuminate\Support\Str::limit($Nav->URL, 4, $end='')=='http' || \Illuminate\Support\Str::limit($Nav->URL, 4, $end='')=='mail')
                        <a class="navbar-item is-tab" href="{{$Nav->URL}}">{{$Nav->NavigateName}}</a>
                        @else
                        <a class="navbar-item is-tab" href="{{$webData['webConfig'][13]->tittle.$Nav->URL}}">{{$Nav->NavigateName}}</a>
                        @endif
                        @endforeach
                        <!--Dynamic END-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="hero is-fullheight is-primary is-align-items-center has-text-centered pageloader">
            <div class="loader-body">
                <img class="loading-logo" src="{{$webData['webConfig'][13]->tittle}}images/Logo_Loading.png">
            </div>
        </section>
        <!-- Main -->
        <div class="pb-6" id="scroll-zone" style="perspective: 1px; min-height: 1000px;" >
            <main data-barba="container" data-barba-namespace="home">
                @section('herocontent')
                @show
                <div class="container is-fluid">
                    <div class="block">
                        @section('content')
                        @show
                    </div>
                </div>
                <div class="container is-fluid">
                    <footer class="footer">
                        <div class="columns">
                            <div class="column is-half has-text-left has-text-centered-mobile">
                                <a href="mailto:public.wuce@gmail.com"><i class="fas fa-envelope mr-1"></i>public.wuce@gmail.com</a>
                            </div>
                            <div class="column">
                                <p class="has-text-right has-text-centered-mobile">
                                    {!!$webData['webConfig'][3]->tittle!!}
                                </p>
                            </div>
                        </div>
                    </footer>
                </div>
            </main>
        </div>

        <script>
            var typed_menu = new Typed("#typed", {
                strings:[ {!! $webData['webConfig'][29]->tittle !!} ],
                stringsElement: '#typed-strings',
                typeSpeed: 70,
                backSpeed: 60,
                backDelay: 4000,
                startDelay: 1000,
                loop: true,
            });
        </script>
    </body>
</html>
