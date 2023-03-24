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
        <link rel="icon" data-rh="true" href="{{asset('favicon.ico')}}">
        <script src="{{$webData['webConfig'][13]->tittle}}js/jquery-3.3.1.min.js"></script>
        <!--TOP BUTTON-->
        <!--<div id="topbottom" href="#top"><i class="fas fa-chevron-up"></i></div>-->
        <script>
            console.log("%c不要看啦，人家會害羞>__<", "color: blue; font-size: 30px;");

            /*TOP BUTTON FUNCTION
            $("#topbottom").click(function () {
                $("html,body").animate({scrollTop: 0}, "slow");
                return false;
            });*/

            $(document).ready(function() {
                // Check for click events on the navbar burger icon
                $(".navbar-burger").click(function() {
                    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                    $(".navbar-burger").toggleClass("is-active");
                    $(".navbar-menu").toggleClass("is-active");
                });
            });
        </script>
        {!! $webData['webConfig'][4]->tittle !!}
    </head>
    <body class="has-navbar-fixed-top">
        <nav class="navbar is-white is-fixed-top" role="navigation" aria-label="main navigation">
            <div class="container is-fluid">
                <div class="navbar-brand">
                    <a class="navbar-item" style="padding: 0.75rem 0rem;" href="{{$webData['webConfig'][13]->tittle}}">
                        <img alt="logo" style="max-height: 50px;" src="{{$webData['webConfig'][13]->tittle}}{{$webData['webConfig'][5]->tittle}}">
                    </a>
                    <!--MibileNavbar-->
                    <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    </a>
                    <!-----END ----->
                </div>
                <div id="MainNavbar" class="navbar-menu" style="padding: 0 1.5rem 0 0;">
                    <div class="navbar-start">
                    <!--Dynamic System Gen-->
                        @foreach($webData['allNav'] as $Nav)
                            @if(($webData['webConfig'][13]->tittle.$Nav->URL)==URL::current())
                            <a class="navbar-item is-tab is-active">{{$Nav->NavigateName}}</a>
                            @else
                                @if(\Illuminate\Support\Str::limit($Nav->URL, 4, $end='')=='http' || \Illuminate\Support\Str::limit($Nav->URL, 4, $end='')=='mail')
                                <a class="navbar-item is-tab" href="{{$Nav->URL}}">{{$Nav->NavigateName}}</a>
                                @else
                                <a class="navbar-item is-tab" href="{{$webData['webConfig'][13]->tittle.$Nav->URL}}">{{$Nav->NavigateName}}</a>
                                @endif
                            @endif
                        @endforeach
                    <!--Dynamic END-->
                    <!-- Flex -->
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link" href="{{$webData['webConfig'][13]->tittle.'page/about'}}">關於</a>
                            <div class="navbar-dropdown">
                                <a href="{{$webData['webConfig'][13]->tittle.'page/about'}}" class="navbar-item">關於我們</a>
                                <a href="{{$webData['webConfig'][13]->tittle.'authors'}}" class="navbar-item">作者介紹</a>
                            </div>
                        </div>
                    <!-- END -->
                    </div>
                    <div class="navbar-end">
                        <a class="navbar-item is-tab {{ (($webData['webConfig'][13]->tittle.'search') == URL::current()) ? ' is-active' : '' }}" href="{{$webData['webConfig'][13]->tittle.'search'}}">
                            <i class="fas fa-search"></i>
                        </a>
                        @if($webData['userData'] == 0)
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link" href="#" style="margin-right: -1.125rem;"><i class="fas fa-user-alt"></i></a>
                            <div class="navbar-dropdown">
                                <a class="navbar-item" href="/login">登入</a>
                            </div>
                        </div>
                        @else
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link" style="margin-right: -1.125rem;">
                                <figure class="image is-48x48 is-1by1" style="margin-left: auto; margin-right: auto;">
                                    <img alt="" class="is-rounded" src="{{$webData['userData'][0]->Avatar}}">
                                </figure>
                            </a>
                            <div class="navbar-dropdown">
                                <a href="/admin" class="navbar-item"><i class="fas fa-cogs"></i>&nbsp創作中心</a>
                                <a href="/admin/editPost/new" class="navbar-item"><i class="fas fa-pen"></i>&nbsp寫新文章</a>
                                <a href="/admin/editNews/new" class="navbar-item"><i class="fas fa-newspaper"></i>&nbsp發新公告</a>
                                <a  href="/admin/mySetting"class="navbar-item"><i class="fas fa-user-cog"></i>&nbsp個人設定</a>
                                <hr class="navbar-divider">
                                <a href="/logout" class="navbar-item"><i class="fas fa-sign-out-alt"></i>&nbsp登出</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
        <!-- Main -->
        <main class="pt-4" id="scroll-zone" style="perspective: 1px; min-height: 1000px;">
            <!-- Breadcrumb
            <div class="container mt-2" style="padding:0 0.75rem; 0 0.75rem" data-scroll-speed="2">
                <nav class="breadcrumb is-hidden-mobile" aria-label="breadcrumbs">
                    <ul>
                    @section('breadcrumb')
                    @show
                    </ul>
                </nav>
            </div>
            END -->
            <div class="container" data-scroll-speed="2">
                <div class="block ml-3 mr-3">
                    @section('content')
                    @show
                </div>
            </div>
            <div class="container">
                <footer class="footer">
                    <div class="columns is-gapless is-vcentered">
                        <div class="column is-4">
                            <div class="rows">
                                @if(strlen($webData['webConfig'][22]->tittle) > 0)
                                <div class="column">
                                    <a href="{{$webData['webConfig'][22]->tittle}}" target="_blank">
                                        <button class="button is-twitter is-outlined is-large is-rounded">
                                            <i class="fab fa-twitter mr-1"></i>Twitter
                                        </button>
                                    </a>
                                </div>
                                @endif
                                @if(strlen($webData['webConfig'][21]->tittle) > 0)
                                <div class="column">
                                    <a href="{{$webData['webConfig'][21]->tittle}}" target="_blank">
                                        <button class="button is-instagram is-large is-rounded">
                                            <i class="fab fa-instagram-square mr-1"></i>Instagram
                                        </button>
                                    </a>
                                </div>
                                @endif
                                @if(strlen($webData['webConfig'][20]->tittle) > 0)
                                <div class="column">
                                    <a href="{{$webData['webConfig'][20]->tittle}}" target="_blank">
                                        <button class="button is-facebook is-outlined is-large is-rounded">
                                            <i class="fab fa-facebook mr-1"></i>Facebook
                                        </button>
                                    </a>
                                </div>
                                @endif
                                @if(strlen($webData['webConfig'][23]->tittle) > 0)
                                <div class="column">
                                    <a href="{{$webData['webConfig'][23]->tittle}}" target="_blank">
                                        <button class="button is-applepodcast is-outlined is-large is-rounded">
                                            <i class="fab fa-apple mr-1"></i>Apple Podcast
                                        </button>
                                    </a>
                                </div>
                                @endif
                                @if(strlen($webData['webConfig'][24]->tittle) > 0)
                                <div class="column">
                                    <a href="{{$webData['webConfig'][24]->tittle}}" target="_blank">
                                        <button class="button is-link is-outlined is-large is-rounded">
                                            <i class="fab fa-google mr-1"></i>Google Podcast
                                        </button>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="column is-4">
                            <p class="has-text-centered">
                                <img alt="footerLogo" width="320" src="{{$webData['webConfig'][13]->tittle}}{{$webData['webConfig'][5]->tittle}}">
                            </p>
                            <p class="has-text-centered">
                                <div class="rows has-text-centered has-text-centered-mobile">
                                    <p class="has-text-centered">
                                        {!!$webData['webConfig'][3]->tittle!!}
                                    </p>
                                </div>
                            </p>
                        </div>

                        <div class="column is-4">
                            @foreach($webData['allButtonNav'] as $bn)
                            <div class="column has-text-right">
                            @if(\Illuminate\Support\Str::limit($bn->URL, 4, $end='')=='http' || \Illuminate\Support\Str::limit($bn->URL, 4, $end='')=='mail')
                            <a href="{{$bn->URL}}" target="_blank">
                                <button class="button is-primary is-outlined is-large is-rounded">
                                {{$bn->NavigateName}}
                                </button>
                            </a>
                            @else
                            <a href="{{$webData['webConfig'][13]->tittle.$bn->URL}}" target="_blank">
                                <button class="button is-primary is-outlined is-large is-rounded">
                                {{$bn->NavigateName}}
                                </button>
                            </a>
                            @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </footer>
            </div>
        </main>
        <!--Locomotive Scroll -->
        <script src="/js/locomotive-scroll.min.js"></script>
        <script>
            (function () {
                var scroll = new LocomotiveScroll(
                    {
                        el: document.querySelector('#scroll-zone'),
                        smooth: true,
                        lerp: 0.2,
                        repeat: true,
                    }
                );
                new ResizeObserver(
                () => scroll.update()).observe(document.querySelector('#scroll-zone'));
            })();

        </script>
        <!--Locomotive Scroll END-->
    </body>
</html>
