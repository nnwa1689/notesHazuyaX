@extends('layout')
@section('title', '關於 - ')
@section('content')
<div data-scroll data-scroll-speed="-1" data-scroll-delay="0" class="mb-4 mt-3">
    <p class="title is-1 has-text-left">
        <span id="titleText"></span>
    </p>
</div>
<p class="title is-5 mt-6" data-scroll data-scroll-speed="-1" data-scroll-delay="0">
    &ldquo;每個設計，都是在有限邊界並由數個點串聯而來。&ldquo;
</p>
<p data-scroll data-scroll-speed="-1" data-scroll-delay="0">設計，就是要在有界限的範圍之中，才能突顯出美感。</p>
<section class="hero is-link is-halfheight mt-6" data-scroll data-scroll-speed="2">
    <div class="hero-body">
        <div class="container is-fluid has-text-left">
            <div class="columns">
                <div class="column is-3">
                    <p class="title is-1" data-scroll="" data-scroll-speed="2"><span class="fas fa-code">&nbsp;</span></p>
                </div>
                <div class="column is-9">
                    <p class="subtitle is-1">服務項目</p>
                    <p class="subtitle is-3"># 網頁設計, # Web前端開發(Vue/React)</p>
                    <p class="subtitle is-3"># ServerLess系統開發(Firebase), # 後端系統開發(PHP/DotNet)</p>
                    <p class="subtitle is-3"># CMS內容管理系統(strapi)</p>
                    <p class="subtitle is-3 mt-6"><a href="/works"># 看看我們做過什麼～</a></p>       
                </div>
            </div>
        </div>
    </div>
</section>


<p><img style="display: block; margin-left: auto; margin-right: auto;" src="/uploadfile/cf3102b1cb2a21092f498bd3b2fe7248.png" alt="" width="256" height="257"></p>

<section class="hero is-success is-halfheight mt-6" data-scroll data-scroll-speed="4" data-scroll-delay="1.5">
    <div class="hero-body">
        <div class="container is-fluid has-text-left">
            <div class="columns">
                <div class="column is-9">
                    <p class="subtitle is-1">樂於技術分享</p>
                    <p class="subtitle is-3"># 在練習中體驗，在專案中實現</p>
                    <p class="subtitle is-3"># 實戰經驗文章分享</p>
                    <p class="subtitle is-3"><a href="/post"># 看看我們的技術雜記</a></p>
                </div>
                <div class="column is-3">
                    <p class="title is-1 has-text-centered" data-scroll-speed="2"><span class="fas fa-book-reader">&nbsp;</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<div data-scroll data-scroll-speed="-1" data-scroll-delay="0" class="mb-4 mt-6">
    <p class="title is-1 has-text-left">成員<span class="has-text-link">TEAM</span></p>
    <p class="title is-4 has-text-right">不斷嘗試各種可能</p>
</div>
<div style="margin-left:-0.75rem; margin-right:-0.75rem;" class="columns is-multiline mt-0 is-justify-content-center">
    @foreach($userData as $User)

    <div data-scroll data-scroll-speed="3" data-scroll-delay="1.5" class="is-author-item">
        <img class="image" src="{{$User->Avatar}}">
        <a class="button author-yourname is-rounded is-medium">{{$User->Yourname}}</a>
        <br/>
        <a class="button author-image-tag is-primary is-outlined is-rounded is-normal">
            <span>{{$User->Signature}}</span>
        </a>
    </div>
    @endforeach
</div>

<section class="hero is-black is-halfheight mt-3" data-scrolldata-scroll-speed="2">
    <div class="hero-body">
        <div class="container has-text-centered">
            <p class="title is-4">對於技術、網站有想法或需求嗎？<br>歡迎來聊聊天！</p>
            <div class="columns">
                <div class="column">
                    <button class="button is-link mt-6" style="min-height: 100px; border-radius: 15px;" onclick="location.href='{{$webData['webConfig'][13]->tittle}}contact'" class="button is-white is-fullwidth is-large">
                        <div class="columns">
                            <div class="column">
                                <p class="title is-6">
                                    聊聊吧
                                    <i class="fas fa-arrow-right ml-1"></i>
                                </p>
                            </div>
                        </div>
                    </button>
                    <button class="button is-primary mt-6" style="min-height: 100px; border-radius: 15px;" onclick="location.href='https\://dev.n-d.tw/'" class="button is-white is-fullwidth is-large">
                        <div class="columns">
                            <div class="column">
                                <p class="title is-6">
                                去驛站
                                    <i class="fas fa-arrow-right ml-1"></i>
                                </p>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var typed = new Typed("#titleText", {
        strings:["關於<span class=\"has-text-link\">ABOUT</span>",],
        stringsElement: '#typed-strings',
        typeSpeed: 70,
        startDelay: 2000,
        loop: false,
    });
</script>
@endsection
