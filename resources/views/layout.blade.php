<html lang="zh-TW">
<head>
    {!! $webData['webConfig'][4]->tittle !!}
    <a id="top"></a>
    <meta charset="UTF-8">
    <meta name="description" content="{{$webData['webConfig'][2]->tittle}}">
    <meta name="keywords" content="{{$webData['webConfig'][1]->tittle}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title'){{$webData['webConfig'][0]->tittle}}</title>
    <link rel="stylesheet" href="{{$webData['webConfig'][13]->tittle}}css/bulma.css">
    <link rel="stylesheet" href="{{$webData['webConfig'][13]->tittle}}css/fontawesome-all.css">
    <link rel="icon" data-rh="true" href="{{asset('favicon.ico')}}">
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
</head>
<body>
    <nav class="navbar is-white" role="navigation" aria-label="main navigation">
        <div class="container is-fulid" style="padding: 0 0.75rem 0 0.75rem;">
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
            <div id="MainNavbar" class="navbar-menu" style="padding: 0 0.75rem 0 0;">
                <div class="navbar-start">
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
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">關於</a>
                        <div class="navbar-dropdown">
                            <a href="{{$webData['webConfig'][13]->tittle.'page/about'}}" class="navbar-item">關於我們</a>

                            <a href="{{$webData['webConfig'][13]->tittle.'authors'}}" class="navbar-item">作者介紹</a>
                        </div>
                    </div>
                </div>
                <div class="navbar-end">
                    <a class="navbar-item{{ (($webData['webConfig'][13]->tittle.'search') == URL::current()) ? ' is-active' : '' }}" href="{{$webData['webConfig'][13]->tittle.'search'}}">
                        <i class="fas fa-search"></i>
                    </a>
                    @if($webData['userData'] == 0)
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link"><i class="fas fa-user-alt"></i></a>
                            <div class="navbar-dropdown">
                                <a class="navbar-item" href="/login">登入</a>
                            </div>
                        </div>

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
      <div class="container is-fulid" style="padding:0 0.75rem; 0 0.75rem">
        <nav class="breadcrumb" aria-label="breadcrumbs">
            <ul>
            @section('breadcrumb')
            @show
            </ul>
          </nav>
      </div>
      <div class="container">
        <div class="columns">
            <div class="column is-9">
                @section('content')
                @show
            </div>
            <div class="column is-3">
                @section('sidebar')
                @show
                <div class="box">
                    <p class="title is-5"><i class="fas fa-user-plus"></i>社群媒體</p>
                    <div class="rows">
                        @if(strlen($webData['webConfig'][20]->tittle) > 0)
                        <div class="column is-full">
                            <a href="{{$webData['webConfig'][20]->tittle}}" target="_blank">
                                <button class="button is-facebook is-outlined is-fullwidth">
                                    <i class="fab fa-facebook"></i> &nbsp;Facebook
                                </button>
                            </a>
                        </div>
                        @endif
                        @if(strlen($webData['webConfig'][21]->tittle) > 0)
                        <div class="column is-full">
                            <a href="{{$webData['webConfig'][21]->tittle}}" target="_blank">
                                <button class="button is-instagram is-fullwidth">
                                    <i class="fab fa-instagram-square"></i>&nbsp;Instagram
                                </button>
                            </a>
                        </div>
                        @endif
                        @if(strlen($webData['webConfig'][22]->tittle) > 0)
                        <div class="column is-full">
                            <a href="{{$webData['webConfig'][22]->tittle}}" target="_blank">
                                <button class="button is-twitter is-outlined is-fullwidth">
                                    <i class="fab fa-twitter"></i>&nbsp;Twitter
                                </button>
                            </a>
                        </div>
                        @endif
                        @if(strlen($webData['webConfig'][23]->tittle) > 0)
                        <div class="column is-full">
                            <a href="{{$webData['webConfig'][23]->tittle}}" target="_blank">
                                <button class="button is-applepodcast is-outlined is-fullwidth">
                                    <i class="fab fa-apple"></i>&nbsp;Apple Podcasts
                                </button>
                            </a>
                        </div>
                        @endif
                        @if(strlen($webData['webConfig'][24]->tittle) > 0)
                        <div class="column is-full">
                            <a href="{{$webData['webConfig'][24]->tittle}}" target="_blank">
                                <button class="button is-link is-outlined is-fullwidth">
                                    <i class="fab fa-google"></i>&nbsp;Google Podcasts
                                </button>
                            </a>
                        </div>
                        @endif
                    </div>
                    <!--
                    <div class="field is-grouped is-grouped-multiline">
                        <div class="fb-page" data-href="https://www.facebook.com/noteshazuya" data-tabs="timeline" data-width="220" data-height="70" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/noteshazuya" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/noteshazuya">NotesHazuya －筆記長也</a></blockquote></div>
                    </div>
                    -->
                </div>
                <div class="box">
                    <p class="title is-5"><i class="fas fa-tags"></i>文章分類</p>
                    <div class="field is-grouped is-grouped-multiline">
                        @foreach($webData['allCategory'] as $category)
                        <div class="control">
                            <div class="tags">
                                <a class="tag is-link is-small" href="{{$webData['webConfig'][13]->tittle}}category/{{$category->ClassId}}">{{$category->ClassName}}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="box">
                    <p class="title is-5"><i class="fas fa-newspaper"></i>最新公告</p>
                    @foreach($webData['homePost'] as $hp)
                    <a href="{{$webData['webConfig'][13]->tittle}}whatsnews/{{$hp->PostId}}">{{$hp->PostDate}}<br>{{$hp->PostTittle}}</a>
                    <hr>
                    @endforeach
                    <button onclick="location.href='{{$webData['webConfig'][13]->tittle}}whatsnews'" class="button is-link is-fullwidth">更多公告</button>
                </div>
                <div class="box">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- 側邊欄廣告 -->
                    <ins class="adsbygoogle"
                        style="display:block"
                        data-ad-client="ca-pub-3826338280068687"
                        data-ad-slot="8823619760"
                        data-ad-format="auto"
                        data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
        </div>
      </div>
</body>
<footer class="footer">
    <div class="container is-fulid" style="padding: 0 0.75rem 0 0.75rem">
        <nav class="level">
            <div class="level-left">
                <div class="level-item">
                    <img width="200" src="{{$webData['webConfig'][13]->tittle}}{{$webData['webConfig'][5]->tittle}}">
                </div>
                <div class="level-item"><p class="subtitle is-6">❤️</p></div>
            </div>
            <div class="level-right">
                <div class="level-item">
                    <div class="rows text-has-right has-text-centered-mobile">
                        <div style="margin-right: -20px;" class="column">
                        @foreach($webData['allButtonNav'] as $bn)
                        @if(\Illuminate\Support\Str::limit($bn->URL, 4, $end='')=='http' || \Illuminate\Support\Str::limit($bn->URL, 4, $end='')=='mail')
                        <a class="has-text-weight-medium" style="margin-right: 10px;" href="{{$bn->URL}}">{{$bn->NavigateName}}</a>
                        @else
                        <a class="has-text-weight-medium" style="margin-right: 10px;" href="{{$webData['webConfig'][13]->tittle.$bn->URL}}">{{$bn->NavigateName}}</a>
                        @endif
                        @endforeach
                        </div>
                        <p class="has-text-right has-text-centered-mobile">
                            {!!$webData['webConfig'][3]->tittle!!}
                        </p>
                    </div>
                </div>
            </div>
        </nav>
    </div>
  </footer>
</html>
