@extends('layout')
@section('title', '關於 - ')
@section('content')
<div class="container">
    <div data-scroll data-scroll-speed="-1" data-scroll-delay="0" class="mb-6">
        <p class="title is-1 has-text-left">
            <span id="titleText"></span>
        </p>
    </div>

    <section class="hero is-halfheight mt-6" data-scroll data-scroll-speed="4">
        <div class="hero-body">
            <div class="container is-fluid">
                <div class="columns">
                    <div class="column is-4">
                        <p class="title is-1">
                            <img width="300" src="{{$webData['webConfig'][13]->tittle}}{{$webData['webConfig'][5]->tittle}}">
                        </p>
                    </div>
                    <div class="column is-8">
                        <p class="has-text-link is-size-1 has-text-left"><i class="fas fa-quote-left"></i></p>
                        <p class="title is-4 has-text-centered">
                            <span id="aboutText"></span>
                        </p>
                        <p class="has-text-link is-size-1 has-text-right"><i class="fas fa-quote-right"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="hero is-link is-halfheight" data-scroll data-scroll-speed="2">
        <div class="hero-body">
            <div class="container is-fluid has-text-left">
                <div class="columns">
                    <div class="column is-3">
                        <p>
                            <img width="64" src="{{$webData['webConfig'][13]->tittle}}images/Logo_Loading.png">
                        </p>
                        <p class="title is-3">服務項目</p>
                    </div>
                    <div class="column is-9">
                        <p class="subtitle is-3"># 網頁設計, # Web前端開發(Vue/React)</p>
                        <p class="subtitle is-3"># 無伺服器系統開發(Firebase, Aws Lightsail)</p>
                        <p class="subtitle is-3"># 後端系統開發(PHP)</p>
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

    <section class="hero is-primary is-halfheight mt-6" data-scroll data-scroll-speed="4">
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
                                    <i class="fas fa-bookmark mr-2"></i><span class="has-text-light">靜態主題網站</span>
                                </p>
                            </div>
                            <div class="column is-4">
                                <p class="title is-5 has-text-link">
                                    <i class="fas fa-bookmark mr-2"></i><span class="has-text-light">動態內容網站</span>
                                </p>
                            </div>
                            <div class="column is-4">
                                <p class="title is-5 has-text-link">
                                    <i class="fas fa-bookmark mr-2"></i><span class="has-text-light">客製化系統網站</span>
                                </p>
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
                                    依照系統目標訂製不同功能之系統
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
                                    $10,000 - $?
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
                                    依系統規模而不同
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

    <section class="hero is-black is-halfheight" data-scroll data-scroll-speed="2">
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
                            <div class="column is-4">
                                <p class="title is-2">01.</p>
                            </div>
                            <div class="column is-8">
                                <p class="title is-2 has-text-link">初期閒聊</p>
                                <p>先了解您的網站需求，像是想要的功能、內容，藉此架構出網站地圖，並提供報價與合約。</p>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column is-3">
                                <p class="title is-2">02.</p>
                            </div>
                            <div class="column is-9">
                                <p class="title is-2 has-text-link">前期準備</p>
                                <p>
                                    由素材、文案、網站地圖架構出網站資訊架構，並決定網站色彩計畫、字體及 UI。
                                </p>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column is-3">
                                <p class="title is-2">03.</p>
                            </div>
                            <div class="column is-9">
                                <p class="title is-2 has-text-link">設計工作</p>
                                <p>
                                    依照前期準備的定案設計出網站初稿，並由您確認後，再產出 Mockup。
                                </p>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column is-3">
                                <p class="title is-2">04.</p>
                            </div>
                            <div class="column is-9">
                                <p class="title is-2 has-text-link">網站系統開發</p>
                                <p>
                                    此階段開始實際進行前端切版及前後端功能開發，同時進行測試與修改。
                                </p>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column is-3">
                                <p class="title is-2">05.</p>
                            </div>
                            <div class="column is-9">
                                <p class="title is-2 has-text-link">上線與結案</p>
                                <p>
                                    將網站部署至線上、提供後台使用說明，並簽訂維護合約。
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <p class="title is-1 has-text-left mt-6">成員<span class="has-text-link">TEAM</span></p>
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

    <button class="button is-link mt-6 p-6 ml-auto mr-auto" style="min-height: 100px; border-radius: 15px;" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}contact')" class="button is-white is-fullwidth is-large">
        <p class="title is-6 p-6 m-6 has-text-light">
            Contact Us
            <i class="fas fa-arrow-right ml-2"></i>
        </p>
    </button>

    <section class="hero is-dark is-halfheight mt-3" data-scroll data-scroll-speed="2">
        <div class="hero-body">
            <div class="container has-text-centered">
                <p class="title is-4">對於技術、網站有想法或需求嗎？<br>歡迎來聊聊天！</p>
                <div class="columns">
                    <div class="column">
                        <button class="button is-link mt-6 p-6" style="min-height: 100px; border-radius: 15px;" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}contact')" class="button is-white is-fullwidth is-large">
                            <p class="title is-6 p-6 m-6">
                                Contact Us
                                <i class="fas fa-arrow-right ml-2"></i>
                            </p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script id="mainScript">
var typed = new Typed("#titleText", {
    strings:["關於<span class=\"has-text-link\">ABOUT</span>",],
    stringsElement: '#typed-strings',
    typeSpeed: 70,
    startDelay: 2000,
    loop: false,
});

var typedAbout = new Typed("#aboutText", {
    strings:[
        "創造溫暖、輕鬆的資訊體驗，<br/><br/>發揮資訊的最大價值。",
    ],
    stringsElement: '#typed-strings',
    typeSpeed: 30,
    startDelay: 2000,
    loop: false,
});
</script>
@endsection
