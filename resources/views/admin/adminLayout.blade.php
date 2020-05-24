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
                    <a class="navbar-item">
            您好，{{$username}}
          </a>
          <a class="navbar-item" href="/admin/mySetting">
            個人化設定
          </a>
                    <a class="navbar-item" href="/logout">
            登出
          </a>

                </div>

            </div>
        </div>
    </nav>
    <!-- END NAV -->
    <div class="container">
        <div class="columns">
            <div class="column is-3 ">
                <aside class="menu is-hidden-mobile">
                    <p class="menu-label">
                        通用設定
                    </p>
                    <ul class="menu-list">
                        <li><a href="/admin" class="is-active">首頁面板</a></li>
                        <li><a href="/admin/webInfo">網站資訊</a></li>
                        <li><a href="/admin/files">檔案庫</a></li>
                    </ul>

                    <p class="menu-label">
                        文章
                    </p>
                    <ul class="menu-list">
                        <li><a href="/admin/editPost/new">新增文章</a></li>
                        <li><a href="/admin/editPost">編輯／刪除文章</a></li>
                        <li><a href="/admin/editCategory">文章分類管理</a></li>
                    </ul>
                    <p class="menu-label">
                        公告
                    </p>
                    <ul class="menu-list">
                        <li><a href="/admin/editNews/new">新增公告</a></li>
                        <li><a href="/admin/editNews">編輯／刪除公告</a></li>
                    </ul>
                    <p class="menu-label">
                        帳號
                    </p>
                    <ul class="menu-list">
                        <li><a href="/admin/editAccount/new">新增帳號</a></li>
                        <li><a href="/admin/editAccount">編輯／刪除帳號</a></li>
                    </ul>
                    <p class="menu-label">
                        頁面
                    </p>
                    <ul class="menu-list">
                        <li><a href="/admin/editPage/new">新增頁面</a></li>
                        <li><a href="/admin/editPage">編輯／刪除頁面</a></li>
                    </ul>
                    <p class="menu-label">
                        導航列
                    </p>
                    <ul class="menu-list">
                        <li><a href="/admin/editNav/top">頂部導航</a></li>
                        <li><a href="/admin/editNav/btn">底部導航</a></li>
                    </ul>
                </aside>
            </div>
            <div class="column is-9">
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
