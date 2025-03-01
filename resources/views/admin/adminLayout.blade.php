<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | NotesX CMS</title>
    <!-- Bulma Version 0.8.x-->
    <link rel="stylesheet" href="{{asset('css/bulma.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="/css/fontawesome-all.css">
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Check for click events on the navbar burger icon
            $(".navbar-burger").click(function() {
                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                $(".navbar-burger").toggleClass("is-active");
                $(".navbar-menu").toggleClass("is-active");
            });
    });
    </script>
</head>

<body class="">
    <!-- START NAV -->
    <nav class="navbar is-white">
        <div class="container" style="padding: 0rem 0.5rem">
            <div class="navbar-brand">
                <a class="navbar-item brand-text" href="/">
                <img src="{{asset('/images/NotesHZ_ICON_2023.png')}}" width="64px" height="64px">
        </a>
                <div class="navbar-burger burger" data-target="navMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div id="navMenu" class="navbar-menu">
                <div class="navbar-start">
                    <div class="navbar-item has-dropdown is-hoverable mr-3">
                        <a class="navbar-link"><i class="fas fa-cog"></i>&nbsp;通用</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="/admin"><i class="fas fa-home"></i>&nbsp;首頁面板</a>
                            <a class="navbar-item" href="/admin/webInfo"><i class="fas fa-info-circle"></i>&nbsp;網站資訊</a>
                            <a class="navbar-item" href="/admin/files"><i class="fas fa-images"></i>&nbsp;媒體庫</a>
                            <a class="navbar-item" href="/admin/uploadFiles"><i class="fas fa-upload"></i>&nbsp;媒體上傳</a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable mr-3">
                        <a class="navbar-link"><i class="fas fa-newspaper"></i>&nbsp;文章</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="/admin/editPost/new"><i class="fas fa-plus-circle"></i>&nbsp;新增文章</a>
                            <a class="navbar-item" href="/admin/editPost/p/1"><i class="fas fa-tools"></i>&nbsp;管理文章</a>
                            <a class="navbar-item" href="/admin/editCategory"><i class="fas fa-folder"></i>&nbsp;分類管理</a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable mr-3">
                        <a class="navbar-link"><i class="fas fa-file"></i>&nbsp;頁面</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="/admin/editPage/new"><i class="fas fa-file"></i>&nbsp;發布頁面</a>
                            <a class="navbar-item" href="/admin/editPage"><i class="fas fa-tools"></i>&nbsp;管理頁面</a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable mr-3">
                        <a class="navbar-link"><i class="fas fa-bars"></i>&nbsp;導航</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="/admin/editNav/top"><i class="fas fa-arrow-up"></i>&nbsp;頁首導航</a>
                            <a class="navbar-item" href="/admin/editNav/btn"><i class="fas fa-arrow-down"></i>&nbsp;底部導航</a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable mr-3">
                        <a class="navbar-link"><i class="fas fa-shapes"></i>&nbsp;作品集</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="/admin/works/new"><i class="fas fa-plus-square"></i>&nbsp;新增作品</a>
                            <a class="navbar-item" href="/admin/works"><i class="fas fa-shapes"></i>&nbsp;管理作品</a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable mr-3">
                        <a class="navbar-link"><i class="fas fa-user-alt"></i>&nbsp;成員</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="/admin/editAccount/new"><i class="fas fa-user-plus"></i>&nbsp;新增成員</a>
                            <a class="navbar-item" href="/admin/editAccount"><i class="far fa-user"></i>&nbsp;管理成員</a>
                        </div>
                    </div>

                </div>
                <div class="navbar-end">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link"><i class="fas fa-user-circle"></i></a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="/admin/mySetting"><i class="fas fa-user-circle"></i>&nbsp;個人設定</a>
                            <a class="navbar-item" href="/logout"><i class="fas fa-sign-out-alt"></i>&nbsp;登出</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- END NAV -->
    <div class="container">
        <div class="columns">
            <div class="column is-full">
            @section('content')
            @show
            </div>
        </div>
    </div>
    <div class="container is-fluid">
        <footer class="footer">
            <div class="has-text-centered">
                <p>
                NotesX CMS Made with <span class="has-text-danger">❤</span>  by 44 Seconds Studio.
                </p>
                <p class="is-size-6">
                    Version:V230831.11
                </p>
            </div>
    </footer>
    </div>
</body>

</html>
