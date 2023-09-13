@extends('layout')
@section('title', '關於 - ')
@section('content')
<style>
    .text_underline {
        border-bottom: 0.25em solid #E86A33;
        box-shadow: 10px 10px 0 0.05em #41644A;
    }
</style>
<div class="container">
    <div data-scroll data-scroll-speed="-1" data-scroll-delay="0" class="mb-6">
        <p class="title is-1 has-text-left">
            <span id="titleText"></span>
        </p>
    </div>

    <p class="title is-1">
        <span class="has-text-background-primary">Original.</span>
    </p>
    <div class="columns is-gapless">
        <div class="column is-7 is-offset-5">
            <p>展現最真實的一面，</p>
        </div>
    </div>
    <hr/>
    <p class="title is-1">
        <span class="has-text-background-primary">Original.</span>
    </p>
    <div class="columns is-gapless">
        <div class="column is-7 is-offset-5">
            <p>展現最真實的一面，</p>
        </div>
    </div>

    <section class="hero is-halfheight mt-6" data-scroll data-scroll-speed="4">
        <div class="hero-body">
            <div class="container is-fluid has-text-left">
                <p class="title is-1">
                    <span class="has-text-link has-text-shadow">Belief</span>
                </p>
                <p class="title is-1 has-text-righy">
                    <span class="has-text-link has-text-shadow">&</span>
                    <span class="has-text-primary has-text-shadow">Passion</span>
                </p>
                <p class="title is-3 has-text-link has-text-left"><i class="fas fa-quote-left"></i></p>
                <p class="title is-3 has-text-primary has-text-centered">相信資訊改變生活，保持熱忱持續嘗試新可能。</p>
                <p class="title is-3 has-text-link has-text-right"><i class="fas fa-quote-right"></i></p>
            </div>
        </div>
    </section>

    <section class="hero is-halfheight mt-6" data-scroll data-scroll-speed="2">
        <div class="hero-body">
            <div class="container is-fluid has-text-left">
                <div class="columns">
                    <div class="column is-3">
                        <p>
                            <img width="64" src="{{$webData['webConfig'][13]->tittle}}images/Logo_Loading.png">
                        </p>
                        <p class="title is-3">技能</p>
                    </div>
                    <div class="column is-9">
                        <p class="subtitle is-3"># 後端系統開發(PHP、Asp.Net MVC)</p>
                        <p class="subtitle is-3"># Web前端開發(VueJS/ReactJS)</p>
                        <p class="subtitle is-3"># 無伺服器系統(Firebase, Aws Lightsail)</p>
                        <p class="subtitle is-3"># 無頭內容管理系統(Strapi)</p>
                        <button class="button is-primary mt-6 is-fullwidth is-large" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}works')" class="button is-white is-fullwidth is-large">
                            <p class="title is-6 p-6 m-6">
                                參考案例
                                <i class="fas fa-arrow-right ml-2"></i>
                            </p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--
    <section class="hero is-shadow is-primary is-halfheight mt-6" data-scroll data-scroll-speed="4">
        <div class="hero-body">
            <div class="container is-fluid has-text-left">
                <div class="columns">
                    <div class="column is-3">
                        <p>
                            <img width="64" style="border-radius: 25535px;" src="{{$webData['webConfig'][13]->tittle}}images/Logo_Loading.png">
                        </p>
                        <p class="title is-3">服務規格</p>
                    </div>
                    <div class="column is-9">
                        <div class="columns">
                            <div class="column is-4">
                                <p class="title is-5 has-text-link">
                                    <i class="fas fa-bookmark mr-2"></i>
                                </p>
                                <p class="title is-5">靜態主題網站</p>
                            </div>
                            <div class="column is-4">
                                <p class="title is-5 has-text-link">
                                    <i class="fas fa-bookmark mr-2"></i>
                                </p>
                                <p class="title is-5">動態內容網站</p>
                            </div>
                            <div class="column is-4">
                                <p class="title is-5 has-text-link">
                                    <i class="fas fa-bookmark mr-2"></i>
                                </p>
                                <p class="title is-5">客製化系統網站</p>
                            </div>
                        </div>
                        <p class="title is-5">用途</p>
                        <hr/>
                        <div class="columns">
                            <div class="column is-4">
                                <p>
                                    用於一頁式主題、活動網站、個人介紹
                                </p>
                            </div>
                            <div class="column is-4">
                                <p>
                                    適合工作室形象官網、部落格之動態網站
                                </p>
                            </div>
                            <div class="column is-4">
                                <p>
                                    依照系統目標、流程訂製不同功能之系統
                                </p>
                            </div>
                        </div>
                        <p class="title is-5">預算</p>
                        <hr/>
                        <div class="columns">
                            <div class="column is-4">
                                <p>
                                    $5,000 - $7,500
                                </p>
                            </div>
                            <div class="column is-4">
                                <p>
                                    $10,000 - $50,000
                                </p>
                            </div>
                            <div class="column is-4">
                                <p>
                                視系統需求、功能數而定
                                </p>
                            </div>
                        </div>

                        <p class="title is-5">製作開發時程</p>
                        <hr/>
                        <div class="columns">
                            <div class="column is-4">
                                <p>
                                    約 0.5 個月 - 1 個月
                                </p>
                            </div>
                            <div class="column is-4">
                                <p>
                                    約 1 個月 - 3 個月
                                </p>
                            </div>
                            <div class="column is-4">
                                <p>
                                    視系統需求、功能數而定
                                </p>
                            </div>
                        </div>

                        <p class="title is-5">參考案例</p>
                        <hr/>
                        <div class="columns">
                            <div class="column is-4">
                                <p>
                                    <a href="https://studio-44s.tw/works/studio44s" target="_blank"><i class="fas fa-arrow-right mr-1"></i>Studio44s</a>
                                </p>
                            </div>
                            <div class="column is-4">
                                <p>
                                    <a href="https://studio-44s.tw/works/studio44s" target="_blank"><i class="fas fa-arrow-right mr-1"></i>Studio44s</a>
                                </p>
                            </div>
                            <div class="column is-4">
                                <p>
                                    <a href="https://studio-44s.tw/works/coemeeting" target="_blank"><i class="fas fa-arrow-right mr-1"></i>會議室預約系統</a>
                                </p>
                                <p>
                                    <a href="https://studio-44s.tw/works/OneDay" target="_blank"><i class="fas fa-arrow-right mr-1"></i>一日記</a>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hero is-shadow is-black is-halfheight mt-6" data-scroll data-scroll-speed="2">
        <div class="hero-body">
            <div class="container is-fluid has-text-left">
                <div class="columns">
                    <div class="column is-3">
                        <p>
                            <img width="64" style="border-radius: 25535px;" src="{{$webData['webConfig'][13]->tittle}}images/Logo_Loading.png">
                        </p>
                        <p class="title is-3">服務流程</p>
                    </div>
                    <div class="column is-9">
                        <div class="columns">
                            <div class="column is-2">
                                <p class="title is-2">01.</p>
                            </div>
                            <div class="column is-4">
                                <p class="title is-2 has-text-link">聊聊</p>
                                <p>先了解您的網站需求，像是想要的功能、內容，藉此架構出網站地圖，並提供報價與合約。</p>
                            </div>
                            <div class="column is-2">
                                <p class="title is-2">02.</p>
                            </div>
                            <div class="column is-4">
                                <p class="title is-2 has-text-link">準備</p>
                                <p>
                                    由素材、文案、網站地圖架構出網站資訊架構，並決定網站色彩計畫、字體及 UI。
                                </p>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column is-2">
                                <p class="title is-2">03.</p>
                            </div>
                            <div class="column is-4">
                                <p class="title is-2 has-text-link">設計</p>
                                <p>
                                    依照前期準備的定案設計出網站初稿，並由您確認後，再產出 Mockup。
                                </p>
                            </div>
                            <div class="column is-2">
                                <p class="title is-2">04.</p>
                            </div>
                            <div class="column is-4">
                                <p class="title is-2 has-text-link">開發</p>
                                <p>
                                    此階段開始實際進行前端切版及前後端功能開發，同時進行測試與修改。
                                </p>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column is-2">
                                <p class="title is-2 has-text-centered">05.</p>
                            </div>
                            <div class="column is-10">
                                <p class="title is-2 has-text-link">上線</p>
                                <p>
                                    將網站部署至線上、提供後台使用說明，並簽訂維護合約。
                                </p>
                                <p class="is-size-6">
                                    （內容僅限軟體 Bug 修復、佈署環境設定，修改系統功能等皆視為新需求）。
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    -->

    <div class="container has-text-centered mt-3" data-scroll data-scroll-speed="2">
        <button class="button is-fullwidth is-large is-link mt-6 p-6" style="min-height: 100px; border-radius: 15px;" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}contact')">
            <p class="title is-6 p-6 m-6 has-text-light">
                Contact Us
                <i class="fas fa-arrow-right ml-2"></i>
            </p>
        </button>
    </div>

    <!--
    <p class="title is-1 has-text-left mt-6">成員<span class="has-text-hollow-link">TEAM</span></p>
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
    <div class="container has-text-centered">
        <button class="button is-fullwidth is-large is-link mt-6 p-6" style="min-height: 100px; border-radius: 15px;" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}contact')">
            <p class="title is-6 p-6 m-6 has-text-light">
                Contact Us
                <i class="fas fa-arrow-right ml-2"></i>
            </p>
        </button>
    </div>
    -->

</div>
<script id="mainScript">
var typed = new Typed("#titleText", {
    strings:["關於<span class=\"has-text-hollow-link is-size-4 ml-2\">About us.</span>",],
    stringsElement: '#typed-strings',
    typeSpeed: 70,
    startDelay: 2000,
    loop: false,
});
</script>
@endsection
