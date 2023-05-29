@extends('layout')
@section('title', '關於 - ')
@section('content')
<div data-scroll data-scroll-speed="-1" data-scroll-delay="0" class="mb-4 mt-3">
    <p class="title is-1 has-text-left">關於<span class="has-text-link">ABOUT</span></p>
</div>
<p class="title is-4 mt-6" data-scroll data-scroll-speed="-1" data-scroll-delay="0">&ldquo;每次用筆記下的事物，<br>都是讓我更靠近並認識自我的滋養。&ldquo;</p>
<p class="is-size-5" data-scroll data-scroll-speed="-1" data-scroll-delay="0">取名「筆記」，是因為自上大學以來我就很習慣透過自己的資訊專業記錄自己的學習過程（過去的筆記長也網站）。我想技術是冷的，但每一個使用技術的心都是熱的，期待我們的風格能與您一同合作。</p>
<section class="hero is-link is-halfheight mt-6" data-scroll data-scroll-speed="2">
    <div class="hero-body">
        <div class="container is-fluid has-text-left">
            <div class="columns">
                <div class="column is-3">
                    <p class="title is-1" data-scroll="" data-scroll-speed="2"><span class="fas fa-code">&nbsp;</span></p>
                </div>
                <div class="column is-9">
                    <p class="subtitle is-1">服務項目</p>
                    <p class="subtitle is-3">#網頁設計, #Web前端開發(Vue/React)</p>
                    <p class="subtitle is-3">#ServerLess系統開發(Firebase), #後端系統開發(PHP/DotNet)</p>
                    <p class="subtitle is-3">#CMS內容管理系統(strapi)</p>
                </div>
            </div>
        </div>
    </div>
</section>

<p class="subtitle is-1 has-text-centered" data-scroll data-scroll-speed="2"><a href="/works">看看我們做過什麼～</a></p>       
<p><img style="display: block; margin-left: auto; margin-right: auto;" src="/uploadfile/57a2f49b946ac192eaa1d833d99abb05.png" alt="" width="256" height="257"></p>

<section class="hero is-success is-halfheight mt-6" data-scroll data-scroll-speed="4" data-scroll-delay="1.5">
    <div class="hero-body">
        <div class="container is-fluid has-text-left">
            <div class="columns">
                <div class="column is-9">
                    <p class="subtitle is-1">樂於技術分享</p>
                    <p class="subtitle is-3">#在練習中體驗，在專案中實現</p>
                    <p class="subtitle is-3">#實戰經驗文章分享</p>
                </div>
                <div class="column is-3">
                    <p class="title is-1 has-text-centered" data-scroll-speed="2"><span class="fas fa-book-reader">&nbsp;</span></p>
                </div>
            </div>
        </div>
    </div>
</section>
<p class="subtitle is-1 has-text-centered" data-scroll="" data-scroll-speed="4"><a href="/post">技術雜記</a></p>

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
@endsection
