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
                    <p class="subtitle is-1">小型 / 無伺服器網站設計</p>
                    <p>我們擅長、常用的技術，後端以 PHP 、.NET Core MVC 為主，並自行開發 CMS 後台。對於現今也非常熱門的雲端技術，我們使用 Firebase 、 Azure 建立 ServerLess 應用服務。前端技術則擅長 Vue 、 React ，並搭配 Firebase 或 Azure App Service 可以建立輕量雲端應用程式，維護技術門檻低、可依照使用情境縮放不同雲端方案，較無技術背景也能維護，非常適合用於個人、中小型機關或組織。</p>
                    <br/>
                    <p>您的需求如果是以下這些，希望能有機會打造新作品：</p>
                    <ul>
                        <li>＞個人一頁式網頁（簡歷、作品呈現）</li>
                        <li>＞小型、無伺服器系統規劃、網站設計</li>
                        <li>＞套版網頁調整</li>
                    </ul>
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
                    <p class="subtitle is-1">技術分享</p>
                    <p>現今無論前端、後端甚至雲端服務技術十分多元，技術的學習已成為了永無止盡的事情！依據我們自己的經驗，技術的更迭十分的快速，從基本的文字編輯工具、後端框架到前端框架，幾乎是每半年到一年就會推出新版本與特性，更別說套件了，在開源社群的風氣之下更新速度更是快速。</p>
                    <p>我們擅長以技術文章分享、系列教學文章以及未來打算推出的 Podcast 與更多系列文章，傳遞相關技術應用。「在練習中體驗，在專案中實現」一直是我們撰寫文章的核心想法，相信透過實際寫程式才能深刻體會每個技術的不同之處。</p>
                </div>
                <div class="column is-3">
                    <p class="title is-1 has-text-centered" data-scroll="" data-scroll-speed="2"><span class="fas fa-book-reader">&nbsp;</span></p>
                </div>
            </div>
        </div>
    </div>
</section>
<p class="subtitle is-1 has-text-centered" data-scroll="" data-scroll-speed="4"><a href="/post">技術雜記</a></p>
<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://dev.n-d.tw/images/NotesDesign_ICON_2023_BORDER.png" alt="" width="256" height="255"></p>

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
                    <button class="button is-link mt-6" style="min-height: 100px; border-radius: 15px;" onclick="location.href='{{$webData['webConfig'][13]->tittle}}page/contact'" class="button is-white is-fullwidth is-large">
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
