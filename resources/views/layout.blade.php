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
                $('.navbar-toggle').click(function(){
                    $('.fullMenu').toggleClass('is-on');
                    $('.navbar').toggleClass('is-navbar-on');
                    $('.navbar-toggle').toggleClass('is-navbar-toggle-on');
                });
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
                    <a class="navbar-item" href="{{$webData['webConfig'][13]->tittle}}">
                        <img alt="logo" style="max-height: 50px;" src="{{$webData['webConfig'][13]->tittle}}{{$webData['webConfig'][5]->tittle}}">
                    </a>
                    <!--MibileNavbar-->
                    <div class="navbar-item navbar-toggle is-mobile" style="margin-left: auto;">
                        <a class="navbar-link is-arrowless" href="#"><i class="fas fa-stream"></i></a>
                    </div>
                    <!-----END ----->
                </div>
                <div id="MainNavbar" class="navbar-menu">
                    <div class="navbar-start">
                    </div>
                    <div class="navbar-end">
                        <div class="navbar-item navbar-toggle">
                            <a class="navbar-link is-arrowless"><i class="fas fa-stream"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="fullMenu">
            <div class="container">
                <div class="columns">
                    <div class="column is-half">
                    <div class="block has-text-centered-mobile">
                        @if(strlen($webData['webConfig'][22]->tittle) > 0)
                            <a href="{{$webData['webConfig'][22]->tittle}}" target="_blank">
                                <button class="button is-twitter is-outlined is-large is-rounded m-2">
                                    <i class="fab fa-twitter"></i>
                                </button>
                            </a>
                        @endif
                        @if(strlen($webData['webConfig'][21]->tittle) > 0)
                            <a href="{{$webData['webConfig'][21]->tittle}}" target="_blank">
                                <button class="button is-instagram is-large is-rounded m-2">
                                    <i class="fab fa-instagram-square"></i>
                                </button>
                            </a>
                        @endif
                        @if(strlen($webData['webConfig'][20]->tittle) > 0)
                            <a href="{{$webData['webConfig'][20]->tittle}}" target="_blank">
                                <button class="button is-facebook is-outlined is-large is-rounded m-2">
                                    <i class="fab fa-facebook"></i>
                                </button>
                            </a>
                        @endif
                        @if(strlen($webData['webConfig'][23]->tittle) > 0)
                            <a href="{{$webData['webConfig'][23]->tittle}}" target="_blank">
                                <button class="button is-applepodcast is-outlined is-large is-rounded m-2">
                                    <i class="fab fa-apple"></i>
                                </button>
                            </a>
                        @endif
                        @if(strlen($webData['webConfig'][24]->tittle) > 0)
                            <a href="{{$webData['webConfig'][24]->tittle}}" target="_blank">
                                <button class="button is-outlined is-large is-white is-rounded m-2">
                                    <i class="fab fa-google"></i>
                                </button>
                            </a>
                        @endif
                    </div>
                    </div>
                    <div class="column is-half">
                        <!--Dynamic System Gen-->
                        @foreach($webData['allNav'] as $Nav)
                        @if(\Illuminate\Support\Str::limit($Nav->URL, 4, $end='')=='http' || \Illuminate\Support\Str::limit($Nav->URL, 4, $end='')=='mail')
                        <a class="navbar-item is-tab" href="{{$Nav->URL}}">{{$Nav->NavigateName}}</a>
                        @else
                        <a class="navbar-item is-tab" href="{{$webData['webConfig'][13]->tittle.$Nav->URL}}">{{$Nav->NavigateName}}</a>
                        @endif
                        @endforeach
                        <!--Dynamic END-->
                        <!--Flex-->
                            <a href="{{$webData['webConfig'][13]->tittle.'page/about'}}" class="navbar-item is-tab">關於</a>
                            <a href="{{$webData['webConfig'][13]->tittle.'authors'}}" class="navbar-item is-tab">小夥伴</a>
                        <!-- END-->
                            <hr class="navbar-divider">
                        @if($webData['userData'] == 0)
                            <a class="navbar-item is-tab" href="/login">登入</a>
                        @else
                            <a href="/admin" class="navbar-item is-tab"><i class="fas fa-cogs mr-1"></i>創作</a>
                            <a href="/logout" class="navbar-item is-tab">
                                <div class="image is-32x32 mr-1">
                                    <figure class="image is-1by1">
                                        <img alt="" class="is-rounded" src="{{$webData['userData'][0]->Avatar}}">
                                    </figure>
                                </div>登出
                            </a>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main -->
        <main class="pb-6" id="scroll-zone" style="perspective: 1px; min-height: 1000px;">
        @section('herocontent')
        @show
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
            <div class="container is-fluid">
                <footer class="footer">
                    <div class="columns">
                        <div class="column is-10">
                            <div class="block has-text-centered-mobile">
                                <p class="is-size-3 mb-3">在社群平台找到我們不同樣貌：</p>
                                @if(strlen($webData['webConfig'][22]->tittle) > 0)
                                    <a href="{{$webData['webConfig'][22]->tittle}}" target="_blank">
                                        <button class="button is-twitter is-outlined is-large is-rounded m-2">
                                            <i class="fab fa-twitter mr-1"></i>Twitter
                                        </button>
                                    </a>
                                @endif
                                @if(strlen($webData['webConfig'][21]->tittle) > 0)
                                    <a href="{{$webData['webConfig'][21]->tittle}}" target="_blank">
                                        <button class="button is-instagram is-large is-rounded m-2">
                                            <i class="fab fa-instagram-square mr-1"></i>Instagram
                                        </button>
                                    </a>
                                @endif
                                @if(strlen($webData['webConfig'][20]->tittle) > 0)
                                    <a href="{{$webData['webConfig'][20]->tittle}}" target="_blank">
                                        <button class="button is-facebook is-outlined is-large is-rounded m-2">
                                            <i class="fab fa-facebook mr-1"></i>Facebook
                                        </button>
                                    </a>
                                @endif
                                @if(strlen($webData['webConfig'][23]->tittle) > 0)
                                    <a href="{{$webData['webConfig'][23]->tittle}}" target="_blank">
                                        <button class="button is-applepodcast is-outlined is-large is-rounded m-2">
                                            <i class="fab fa-apple mr-1"></i>Apple Podcast
                                        </button>
                                    </a>
                                @endif
                                @if(strlen($webData['webConfig'][24]->tittle) > 0)
                                    <a href="{{$webData['webConfig'][24]->tittle}}" target="_blank">
                                        <button class="button is-outlined is-large is-white is-rounded m-2">
                                            <i class="fab fa-google mr-1"></i>Google Podcast
                                        </button>
                                    </a>
                                @endif
                            </div>

                            <div class="block has-text-centered-mobile">
                                <p class="is-size-3 mb-3">或看看我們很在意但不好說的東西：</p>
                                @foreach($webData['allButtonNav'] as $bn)
                                @if(\Illuminate\Support\Str::limit($bn->URL, 4, $end='')=='http' || \Illuminate\Support\Str::limit($bn->URL, 4, $end='')=='mail')
                                <a href="{{$bn->URL}}">
                                    <button class="button is-white is-outlined is-large is-rounded m-2">
                                    {{$bn->NavigateName}}
                                    </button>
                                </a>
                                @else
                                <a href="{{$webData['webConfig'][13]->tittle.$bn->URL}}">
                                    <button class="button is-white is-outlined is-large is-rounded m-2">
                                    {{$bn->NavigateName}}
                                    </button>
                                </a>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="column">
                            <div class="block">
                                <p class="has-text-centered">
                                    <img alt="footerLogo" width="200" src="{{$webData['webConfig'][13]->tittle}}{{$webData['webConfig'][5]->tittle}}">
                                </p>
                                <p class="has-text-centered">
                                    {!!$webData['webConfig'][3]->tittle!!}
                                </p>
                            </div>
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
