@extends('layout')
@section('title', $postData[0]->PostTittle.' - ')
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li><a href="{{$webData['webConfig'][13]->tittle}}post">所有文章</a></li>
    <li><a href="{{$webData['webConfig'][13]->tittle}}category/{{$postData[0]->ClassId}}">{{$postData[0]->ClassName}}</a></li>
    <li class="is-active"><a href="#" aria-current="page">{{$postData[0]->PostTittle}}</a></li>
@endsection
@section('content')
@parent
    <link rel="stylesheet" href="{{$webData['webConfig'][13]->tittle}}/codes/styles/prism.css">
    <script src="{{$webData['webConfig'][13]->tittle}}/codes/prism.js"></script>
    <div data-scroll data-scroll-speed="2" data-scroll-delay="1.5" class="section has-text-centered mb-3 mt-6">
        <a class="tag button is-medium is-primary is-outlined is-rounded" href="{{$webData['webConfig'][13]->tittle}}category/{{$postData[0]->ClassId}}">{{$postData[0]->ClassName}}</a>
        <p class="is-size-2 mb-2">{{$postData[0]->PostTittle}}
            @if($webData['userData'] !== 0)
                <button class="button is-link is-outlined is-small" onclick="window.location.href = '{{$webData['webConfig'][13]->tittle}}admin/editPost/{{$postData[0]->PostId}}';"><i class="far fa-edit"></i>&nbsp;編輯</button>
            @endif
        </p>
        <div class="columns is-multiline is-justify-content-center">
            <p class="is-size-6 mr-2"><i class="fas fa-clock mr-1"></i>{{$postData[0]->ReadTime}}分鐘</p>
            <p class="is-size-6"><i class="fas fa-calendar-alt mr-1"></i>{{$postData[0]->PostDate}}</p>
        </div>

        <!--
        <nav class="level mb-2">
            <div class="level-left">
                <div class="level-item">

                </div>
            </div>
            <div class="level-right">
                <div class="level-item">
                    <a class="tag button is-medium is-primary is-outlined" href="{{$webData['webConfig'][13]->tittle}}category/{{$postData[0]->ClassId}}">{{$postData[0]->ClassName}}</a>&nbsp;

                    <div class="buttons has-addons is-centered">
                        <button class="button is-link is-outlined is-medium"><div class="fb-like" data-href="{{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div></button>
                        <button class="button is-facebook is-outlined" onclick="window.open('https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&u={{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}&display=popup&ref=plugin&src=share_button','', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fab fa-facebook-square"></i></button>
                        <button class="button is-twitter  is-outlined" onclick="window.open('https://twitter.com/intent/tweet?original_referer={{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}&text={{$postData[0]->PostTittle}}&tw_p=tweetbutton&url={{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}','', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fab fa-twitter-square"></i></button>
                        <button class="button is-plurk is-outlined" onclick="window.open('https://www.plurk.com/?qualifier=shares&status={{$postData[0]->PostTittle}}{{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}','', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fab fa-product-hunt"></i></button>
                        <button class="button is-tumblr is-outlined" onclick="window.open('https://www.tumblr.com/widgets/share/tool/preview?shareSource=legacy&canonicalUrl=&url={{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}&posttype=link&title={{$postData[0]->PostTittle}}&caption=&content={{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}','', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fab fa-tumblr"></i></button>
                        <button class="button is-link is-outlined" onclick="window.location.href='mailto:?subject={{$postData[0]->PostTittle}}&body={{$postData[0]->PostTittle}}{{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}'"><i class="fas fa-at"></i></button>
                    </div>
                </div>
            </div>
        </nav>

        <div class="block mt-0 mb-0">
            <nav class="level">
                <div class="level-left">
                </div>
                <div class="level-right">
                    <div class="level-item">
                        <i class="fas fa-clock"></i>&nbsp;{{$postData[0]->ReadTime}}分鐘
                    </div>
                    <div class="level-item">
                        <i class="fas fa-calendar-alt"></i>&nbsp;{{$postData[0]->PostDate}}
                    </div>
                </div>
            </nav>
        </div>
        -->
    </div>
    <div class="container is-max-desktop mb-6">
        <div class="content line-numbers">
        {!! $postData[0]->PostContant !!}
        </div>
    </div>
    <div class="container is-max-desktop mt-6 mb-6">
        <div class="columns is-variable is-5 p-0 is-align-content-center is-align-items-center" data-scroll data-scroll-speed="2" data-scroll-delay="1.5">
            <div class="column is-2">
                <div class="image is-128x128" style="margin-left:auto; margin-right:auto;">
                    <figure class="image is-1by1">
                        <img class="is-rounded" src="{{$autorData[0]->Avatar}}">
                    </figure>
                </div>
                <div class="block has-text-centered mt-3">
                    <a href="mailto:{{$autorData[0]->Email}}" class="mr-4"><i class="far fa-envelope-open"></i></ㄇ>
                    <a href="/person/{{$autorData[0]->username}}/post/p/1" class="mr-0"><i class="fas fa-file"></i></a>
                    @if(isset($autorData[0]->Url_Linked) && $autorData[0]->Url_Linked !== "")
                    <a href="{{$autorData[0]->Url_Linked}}" target="_blank" class="ml-4"><i class="fab fa-linkedin"></i></a>
                    @endif
                    @if(isset($autorData[0]->Url_GitHub) && $autorData[0]->Url_GitHub !== "")
                    <a href="{{$autorData[0]->Url_GitHub}}" target="_blank" class="ml-4 mr-0"><i class="fab fa-github"></i></a>
                    @endif
                </div>
            </div>
            <div class="column is-10">
                <div class="box">
                    <div class="block p-4">
                        <!--<a class="is-size-3" href="/person/{{$autorData[0]->username}}">{{$autorData[0]->Yourname}}</a>-->
                        <p class="has-text-centered limit3rows">
                            {{$autorData[0]->Signature}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="columns is-multiline is-gapless" data-scroll data-scroll-speed="2" data-scroll-delay="1.5">
            <!--
            <div class="column is-12">
            @if(isset($leftPost[0]))
            <div class="is-homeBanner">
                <button style="min-height: 100px; border-radius: 15px;" onclick="location.href='{{$leftPost[0]->PostId}}'" class="button is-white is-fullwidth is-large">
                    <div class="columns">
                        <div class="column">
                            <p class="title is-4">
                                <i class="fas fa-angle-left ml-1" aria-hidden="true"></i>上一篇
                            </p>
                            <p class="title is-4 limit1rows">
                                {{$leftPost[0]->PostTittle}}
                            </p>
                        </div>
                    </div>
                </button>
            </div>
            @endif
            </div>
            -->
            @if(isset($rightPost[0]))
            <div class="column is-12">
                <div class="is-homeBanner">
                    <button style="min-height: 130px; border-radius: 15px;" onclick="location.href='{{$rightPost[0]->PostId}}'" class="button is-white is-fullwidth is-multiline is-large pt-3 pb-3">
                        <p class="subtitle is-4 mb-4">
                            下一篇<i class="fas fa-angle-right ml-1" aria-hidden="true"></i>
                        </p>
                        <p class="subtitle is-4 limit1rows">
                            {{$rightPost[0]->PostTittle}}
                        </p>
                    </button>
                </div>
            </div>
            @endif
        </div>
    </div>

    @if($postData[0]->Reply=="Yes")
    <div class="block">
        <script src="https://utteranc.es/client.js"
            repo="nnwa1689/NoteshazuyaBlogComment"
            issue-term="pathname"
            theme="github-light"
            crossorigin="anonymous"
            async>
        </script>
    </div>

    <!--
        //如果下個月都沒問題就可以換掉了
    <div class="box">
        <div id="disqus_thread"></div>
        <script>
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        var disqus_config = function () {
            this.page.url = '{{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}';  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = '{{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://noteshazuya.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    </div>
    -->
    @endif

    <div class="box" data-scroll data-scroll-speed="2" data-scroll-delay="1.5">
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
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Article",
            "name" : "{{$postData[0]->PostTittle}}",
            "author" : "{{$autorData[0]->Yourname}}",
            "datePublished" : "{{$postData[0]->PostDate}}",
            "image" : "null",
            "articleBody" : "{{ $postData[0]->PostContant }}",
            "headline": "{{$postData[0]->PostTittle}}",
            "publisher" : {
            "@type" : "Organization",
            "name" : "{{$webData['webConfig'][0]->tittle}}",
            "logo" : "{{$webData['webConfig'][13]->tittle}}{{$webData['webConfig'][5]->tittle}}"}
        }
    </script>
@endsection
