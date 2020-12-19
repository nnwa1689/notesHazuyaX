<html lang="zh-TW">
<head>
    <a id="top"></a>
    <meta charset="UTF-8">
    <meta name="description" content="{{$webData['webConfig'][2]->tittle}}">
    <meta name="keywords" content="{{$webData['webConfig'][1]->tittle}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title'){{$webData['webConfig'][0]->tittle}}</title>
    <link rel="stylesheet" href="{{$webData['webConfig'][13]->tittle}}css/bulma.css">
    <link rel="stylesheet" href="{{$webData['webConfig'][13]->tittle}}css/fontawesome-all.css">
    <link rel="icon" data-rh="true" href="{{asset('favicon.ico')}}">
    <a>{!! $webData['webConfig'][4]->tittle !!}</a>
    <script src="{{$webData['webConfig'][13]->tittle}}js/jquery-3.3.1.min.js"></script>
    <div id="topbottom" href="#top"><i class="fas fa-chevron-up"></i></div>
        <script>
            console.log("%c不要看啦，人家會害羞>__<", "color: blue; font-size: 30px;");

            $("#topbottom").click(function () {
                $("html,body").animate({scrollTop: 0}, "slow");
                return false;
            });

            $(document).ready(function() {
                // Check for click events on the navbar burger icon
                $(".navbar-burger").click(function() {
                    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                    $(".navbar-burger").toggleClass("is-active");
                    $(".navbar-menu").toggleClass("is-active");
                });
            });
        </script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v7.0"></script>
</head>
<body>

    <nav class="navbar has-shadow is-white" role="navigation" aria-label="main navigation">
        <div class="container is-fulid">
            <div class="navbar-brand">
            <a class="navbar-item" href="{{$webData['webConfig'][13]->tittle}}">
                <img src="{{$webData['webConfig'][13]->tittle}}{{$webData['webConfig'][5]->tittle}}">
            </a>
            <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            </a>
            </div>

            <div id="MainNavbar" class="navbar-menu">
                <div class="navbar-start">
                </div>
                <div class="navbar-end">
                    @foreach($webData['allNav'] as $Nav)
                    @if(($webData['webConfig'][13]->tittle.$Nav->URL)==URL::current())
                    <a class="navbar-item is-active">{{$Nav->NavigateName}}</a>
                    @else
                    @if(\Illuminate\Support\Str::limit($Nav->URL, 4, $end='')=='http' || \Illuminate\Support\Str::limit($Nav->URL, 4, $end='')=='mail')
                    <a class="navbar-item" href="{{$Nav->URL}}">{{$Nav->NavigateName}}</a>
                    @else
                    <a class="navbar-item" href="{{$webData['webConfig'][13]->tittle.$Nav->URL}}">{{$Nav->NavigateName}}</a>
                    @endif
                    @endif
                    @endforeach

                    @if($webData['userData'] == 0)
                        <a class="navbar-item" href="/login"><i class="fas fa-user-alt"></i>登入</a>
                    @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            <figure class="image is-48x48" style="margin-left: auto; margin-right: auto;">
                                <img class="is-rounded" src="/{{$webData['userData'][0]->Avatar}}">
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
        </div>
      </nav>
      <div class="container is-fulid">

        <nav class="breadcrumb" aria-label="breadcrumbs">
            <ul>
            @section('breadcrumb')
            @show
            </ul>
          </nav>

      </div>

      <div class="container">
        <div class="columns">
            <div class="column is-full">
                @section('content')
                @show
            </div>
        </div>
      </div>
</body>
<footer class="footer">
    <div class="container is-fulid">
        <div class="columns">
            <div class="column is-one-third">
                <p class="title is-5"><i class="fab fa-facebook"></i>粉絲專頁</p>
                <div class="field is-grouped is-grouped-multiline">
                    <div class="fb-page" data-href="https://www.facebook.com/noteshazuya" data-tabs="timeline" data-width="350" data-height="240" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/noteshazuya" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/noteshazuya">NotesHazuya －筆記長也</a></blockquote></div>
                </div>
            </div>
            <div class="column">
                <p class="title is-5"><i class="fas fa-tags"></i>文章分類</p>
                <div class="field is-grouped is-grouped-multiline">
                    @foreach($webData['allCategory'] as $category)
                    <div class="control">
                        <div class="tags has-addons">
                            <a class="tag is-link" href="{{$webData['webConfig'][13]->tittle}}category/{{$category->ClassId}}">{{$category->ClassName}}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="column">
                <p class="title is-5"><i class="fas fa-newspaper"></i>最新公告</p>
                @foreach($webData['homePost'] as $hp)
                <a href="{{$webData['webConfig'][13]->tittle}}whatsnews/{{$hp->PostId}}">{{$hp->PostDate}}<br>{{$hp->PostTittle}}</a>
                <hr>
                @endforeach
                <button onclick="location.href='{{$webData['webConfig'][13]->tittle}}whatsnews'" class="button is-link is-fullwidth">更多公告</button>
            </div>
        </div>
        <br>
        <div class="content has-text-centered">
        <p>
            @foreach($webData['allButtonNav'] as $bn)
            @if(\Illuminate\Support\Str::limit($bn->URL, 4, $end='')=='http' || \Illuminate\Support\Str::limit($bn->URL, 4, $end='')=='mail')
            <a href="{{$bn->URL}}">{{$bn->NavigateName}}</a>&nbsp;&nbsp;
            @else
            <a href="{{$webData['webConfig'][13]->tittle.$bn->URL}}">{{$bn->NavigateName}}</a>&nbsp;&nbsp;
            @endif
            @endforeach
        </p>
        <p>
            {!!$webData['webConfig'][3]->tittle!!}
        </p>
        </div>
    </div>
  </footer>
</html>
