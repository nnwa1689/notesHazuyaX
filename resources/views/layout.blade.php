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
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3826338280068687"
        crossorigin="anonymous"></script>
        <script src="{{$webData['webConfig'][13]->tittle}}js/typed.umd.js"></script>
        <script>
            console.log("%c*44 Seconds Studio* 嗨，很高興在這裡看到你！", "padding:5px 15px; color: #263A29; font-size: 14px; border: 2px solid #E86A33; background:#F2E3DB;border-radius:5px;");
            console.log("%c來到這裡不太容易吧，歡迎來我們這裡喝喝茶聊聊天唷XD", "padding:5px 15px; color: #F2E3DB; font-size: 14px; border: 2px solid #000000; background:#E86A33;border-radius:5px;");
            console.log("%chttps://studio-44s.tw/contact", "padding:5px 15px; color: #F2E3DB; font-size: 14px; border: 2px solid #000000; background:#E86A33;border-radius:5px;");
            $(document).ready(function() {
                let player = document.querySelector("lottie-player");
                $('.navbar-toggle').click(function(){
                    $('.fullMenu').toggleClass('is-on');
                    $('.navbar-toggle').toggleClass('is-navbar-toggle-on');
                });

                $(".navbar-burger").click(function() {
                    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                    $(".navbar-burger").toggleClass("is-active");
                    $(".navbar-menu").toggleClass("is-active");
                });

                $(".fullMenu").click(function() {
                    $('.fullMenu').toggleClass('is-on');
                    $('.navbar-toggle').toggleClass('is-navbar-toggle-on');
                });

                setTimeout(() => {
                    gsap.to(".pageloader", {
                        duration: 1.5,
                        y: '+120vh',
                        ease: "power4.inOut"
                    });
                }, 1000);
                /* Loading
                setTimeout(() => {
                    $(".pageloader").toggleClass("loading");
                }, 1500);
                setTimeout(() => {
                    player.stop();
                }, 2000);
                */
            });
        </script>
        {!! $webData['webConfig'][4]->tittle !!}
    </head>
    <body class="has-navbar-fixed-top" data-barba="wrapper">
        <nav class="navbar is-white is-fixed-top" role="navigation" aria-label="main navigation">
            <div class="container is-fluid">
                <div class="navbar-brand">
                    <a class="navbar-item" href="{{$webData['webConfig'][13]->tittle}}">
                        <img alt="logo" style="max-height: 50px;" src="{{$webData['webConfig'][13]->tittle}}{{$webData['webConfig'][5]->tittle}}">
                    </a>
                    <!--MibileNavbar-->
                    <div class="navbar-item navbar-toggle is-mobile" style="margin-left: auto; margin-right: -0.75rem">
                        <a class="navbar-link is-arrowless"><i class="fas fa-stream"></i></a>
                    </div>
                    <!--END -->
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
            <div class="container is-max-desktop" style="margin-top:7rem;">
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
                        <!--
                        @if(gettype($webData['userData']) == 'integer')
                            <a class="navbar-item is-tab" target="_blank" href="/login">登入</a>
                        @else
                            <a target="_blank" href="/admin" class="navbar-item is-tab"><i class="fas fa-cogs mr-1"></i>管理</a>
                            <a href="/logout" class="navbar-item is-tab">
                                <div class="image is-32x32 mr-1">
                                    <figure class="image is-1by1">
                                        <img alt="" class="is-rounded" src="{{$webData['userData'][0]->Avatar}}">
                                    </figure>
                                </div>登出
                            </a>
                        @endif
                        -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="hero is-fullheight is-primary is-align-items-center has-text-centered pageloader">
            <div class="loader-body">
                <!--
                <lottie-player
                    class="is-align-items-center"
                    src="{{$webData['webConfig'][13]->tittle}}lf30_zlkyyxof.json"
                    background="transparent"
                    speed="1.5"
                    style="width: 450px; height: 300px;"
                    loop
                    autoplay
                >
                </lottie-player>
                -->
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
            <!--Locomotive Scroll -->
            <script>
                var scroll = new LocomotiveScroll(
                    {
                        el: document.querySelector('#scroll-zone'),
                        smooth: true,
                        lerp: 0.1,
                        repeat: true,
                    }
                );
                new ResizeObserver(() => {
                    scroll.update();
                }
                ).observe(document.querySelector('#scroll-zone'));
            </script>
        </div>
        <script src="{{$webData['webConfig'][13]->tittle}}codes/prism.js"></script>
        <!---Kursor---->
        <script src="{{$webData['webConfig'][13]->tittle}}js/kursor.js"></script>
        <script>
            new kursor({
                type: 4,
                color: "#E86A33"
            });
        </script>
        <!--TypedJS-->
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

        <script>
            barba.init({
                sync: true,
                transitions: [{
                    leave(data) {
                        return gsap.to(".pageloader", {
                            duration: 1.5,
                            y: 0,
                            ease: "power4.inOut",
                        });
                    },
                    after(data) {
                        return gsap.to(".pageloader", {
                            duration: 1.5,
                            y: '+120vh',
                            ease: "power4.inOut",
                            delay: 1
                        });
                    },
                    beforeEnter() {
                        scroll.scrollTo('top', { 'duration':0 });
                    }
                }]
            });

            barba.hooks.enter(
                () => {
                    Prism.highlightAll();
                }
            )

            barba.hooks.after((data) => {
                let js = data.next.container.querySelectorAll('main script');
                if(js != null){
                    js.forEach((item) => {
                        eval(item.innerHTML);
                    });
                }
            });
        </script>
        <script>
            function submit() {
                var name = $("#Name").val();
                var email = $("#Email").val();
                var type = $("#Type").val();
                var budgetranges = $("#BudgetRanges").val();
                var content = $("#Content").val();

                $("#suc").css("display", "none");
                $("#error").css("display", "none");

                if (name.length < 1 || email.length < 1 || content.length < 5) {
                    $("#error").css("display", "block");
                } else {
                    $.ajax({
                        type: "POST",
                        url: "https://strapi.studio-44s.tw/api/holas",
                        dataType: "json",
                        data: {
                            "data": {
                                "Name": name,
                                "Email": email,
                                "Content": content,
                                "BudgetRanges": budgetranges,
                                "Statu": "unsettled",
                                "Type": type
                            }
                        },
                        success: function (response) {
                            $("#suc").css("display", "block");
                            $("#Name").val("");
                            $("#Email").val("");
                            $("#Content").val("");
                        },
                        error: function (thrownError) {
                            $("#error").css("display", "block");
                        }
                    });
                }
            }
        </script>
    </body>
</html>
