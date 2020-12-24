<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')Hazuya創作中心</title>

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

<body>

    <!-- START NAV -->
    <nav class="navbar is-white">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item brand-text" href="/">
          Hazuya創作中心
        </a>
                <div class="navbar-burger burger" data-target="navMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div id="navMenu" class="navbar-menu">
                <div class="navbar-start">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">通用</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="/admin">首頁面板</a>
                            <a class="navbar-item" href="/admin/webInfo">網站資訊</a>
                            <a class="navbar-item" href="/admin/files">媒體庫</a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">文章</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="/admin/editPost/new">新增文章</a>
                            <a class="navbar-item" href="/admin/editPost/p/1">管理文章</a>
                            <a class="navbar-item" href="/admin/editCategory">分類管理</a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">公告</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="/admin/editNews/new">發布公告</a>
                            <a class="navbar-item" href="/admin/editNews">管理公告</a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">頁面</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="/admin/editPage/new">發布頁面</a>
                            <a class="navbar-item" href="/admin/editPage">管理頁面</a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">導航</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="/admin/editNav/top">頁首導航</a>
                            <a class="navbar-item" href="/admin/editNav/btn">底部導航</a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">帳號</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="/admin/editAccount/new">新增帳號</a>
                            <a class="navbar-item" href="/admin/editAccount">管理帳號</a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">{{$username}}</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="/admin/mySetting">個人設定</a>
                            <a class="navbar-item" href="/logout">登出</a>
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
    <footer class="footer">
    <div class="content has-text-centered">
      <p>
          2020 HiHazuya X!
      </p>
    </div>
  </footer>
</body>

</html>
