@extends('layout')
@section('title', '關於 - ')
@section('content')
<div class="container">
    <div data-scroll data-scroll-speed="-1" data-scroll-delay="0" class="mb-4 mt-3">
        <p class="title is-1 has-text-left">
            <span id="titleText"></span>
        </p>
    </div>
    <br/>
    <div class="mt-6">
        <p class="has-text-link is-size-1 mb-6"><i class="fas fa-quote-left"></i></p>
        <p class="is-size-3 has-text-centered"> 在資訊樣貌多元的今天，相信您有很多想和大家說的，</p>
        <p class="is-size-3 has-text-centered"> 也許是一段故事、一首歌、一道菜或是一個理念，我們也是！</p>
        <p class="is-size-3 has-text-centered">因此，我們的使命就是讓您所訴說的內容更易於被受眾看見並且理解，</p>
        <p class="is-size-3 has-text-centered">在他們心中種下一顆小小的火種。</p>
        <p class="has-text-link is-size-1 has-text-right mt-6"><i class="fas fa-quote-right"></i></p>
    </div>
    <section class="hero is-link is-halfheight" data-scroll data-scroll-speed="2">
        <div class="hero-body">
            <div class="container is-fluid has-text-left">
                <p class="subtitle is-1">服務項目</p>
                <p class="subtitle is-3"># 網頁設計, # Web前端開發(Vue/React)</p>
                <p class="subtitle is-3"># 無伺服器系統開發(Firebase, Aws Lightsail)</p>
                <p class="subtitle is-3"># 後端系統開發(PHP)</p>
                <p class="subtitle is-3"># 無頭內容管理系統(Strapi)</p>
                <p class="subtitle is-3 mt-6"><a href="/works"># 看看我們做過什麼～</a></p>
                <hr/>
                <p class="title is-1 has-text-centered" data-scroll>
                    <span class="fas fa-code mr-2">&nbsp;</span>
                    <span class="fab fa-react mr-2">&nbsp;</span>
                    <span class="fab fa-vuejs mr-2">&nbsp;</span>
                    <span class="fab fa-aws mr-2">&nbsp;</span>
                    <span class="fab fa-php mr-2">&nbsp;</span>
                </p>
            </div>
        </div>
    </section>

    <section class="hero is-primary is-halfheight mt-6" data-scroll data-scroll-speed="4">
        <div class="hero-body">
            <div class="container is-fluid has-text-left">
                <div class="columns">
                    <div class="column is-3">
                        <p class="title is-1"><i class="fas fa-hands"></i></p>
                    </div>
                    <div class="column is-9">
                        <p class="subtitle is-1">但，可能有些要注意的地方</p>
                        <p class="subtitle is-4"># 樣式可客製化設計，不會大家都長得一樣</p>
                        <p class="subtitle is-4"># 但也可以提供套版方式開發，如果專案很趕的話</p>
                        <p class="subtitle is-4"># 我會依照規模需求，提供合適的技術、託管平台</p>
                        <p class="subtitle is-4"># 對於過往我沒設計過的功能，可能需要再多討論</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <p>
        <img style="display: block; margin-left: auto; margin-right: auto;" src="/uploadfile/7e9c1f909b7113d5f56a4b3191a5d520.png" alt="" width="256" height="257">
    </p>

    <section class="hero is-success is-halfheight mt-6" data-scroll data-scroll-speed="2" data-scroll-delay="1.5">
        <div class="hero-body">
            <div class="container is-fluid has-text-left">
                <div class="columns">
                    <div class="column is-9">
                        <p class="subtitle is-1">服務流程</p>
                        <p class="subtitle is-3"># 需求調查與訪談</p>
                        <p class="is-size-5">了解您的網站需求、業務、功能與風格，並依您預算評估可行性與時程。評估若您我皆可接受製作方案與價格，就會與您收取50%訂金，並簽訂契約。</p>
                    </div>
                    <div class="column is-3">
                        <p class="title is-1 has-text-right"><i class="fas fa-comment"></i></p>
                    </div>
                </div>
                <hr/>
                <div class="columns">
                    <div class="column is-9">

                        <p class="subtitle is-3"># 風格設計、模板選擇</p>
                        <p class="is-size-5">
                            依照需求階段決定之風格(配色、首頁設計、頁面版型)及您提供之資料(如關於我們之簡介、圖片)進行設計發想，並繪製草圖。
                            <br/>
                            # 此階段將提供設計草圖並與您確認，進行調整。(若您選定某個模板，會再次與您確認是否有需要調整之地方)
                        </p>

                    </div>
                    <div class="column is-3">
                        <p class="title is-1 has-text-right"><i class="fas fa-pencil-ruler"></i></p>
                    </div>
                </div>
                <hr/>
                <div class="columns">
                    <div class="column is-9">
                        <p class="subtitle is-3"># 設計製作、資料套版</p>
                        <p class="is-size-5">
                            依照討論好的設計草圖，製作出實際的網頁靜態模板。若選擇特定模板，也同樣會提供靜態模板預覽，並第二次確認設計內容、調整。
                            <br/>
                            # 此階段將提供實際的網頁預覽並與您確認，進行調整。
                        </p>
                    </div>
                    <div class="column is-3">
                        <p class="title is-1 has-text-right"><i class="fas fa-map"></i></p>
                    </div>
                </div>
                <hr/>
                <div class="columns">
                    <div class="column is-9">
                        <p class="subtitle is-3"># 系統規劃設計</p>
                        <p class="is-size-5">
                            完成風格設計後，將規劃系統前台地圖與後台功能，並提供架構圖、採用之技術規格與您核對。確認後將實際進入系統架設、開發與資料轉入。
                        </p>
                    </div>
                    <div class="column is-3">
                        <p class="title is-1 has-text-right"><i class="fas fa-route"></i></p>
                    </div>
                </div>
                <hr/>
                <div class="columns">
                    <div class="column is-9">
                        <p class="subtitle is-3"># 系統開發與測試</p>
                        <p class="is-size-5">
                            依照確認之功能與技術進行實際開發，並依照模組功能或全部完工後進行測試(若採用依照功能模組測試可能會花費較長的時間，實際取決於您測試之時程)
                            <br/>
                            # 此階段將架設測試用系統提供您測試，每個模組可提供您進行一次的修改確認。
                        </p>
                    </div>
                    <div class="column is-3">
                        <p class="title is-1 has-text-right"><i class="fas fa-terminal"></i></p>
                    </div>
                </div>
                <hr/>
                <div class="columns">
                    <div class="column is-9">
                        <p class="subtitle is-3"># 後期作業、結案</p>
                        <p class="is-size-5">
                            依照選定規格協助申請空間、網址與 SSL(原則上若沒特殊需求，會提供免費的 OpenSSL)，並將您的系統部署至您的空間當中。同時，並收取您的尾款後，將會提供後台使用教育訓練、操作手冊，至此就完成了一次愉快的合作體驗！
                            <br/>
                            # 結案後，每案件提供 3 個月的保固期，若遇 Bug 修復不額外計價(新需求另計)
                        </p>
                    </div>
                    <div class="column is-3">
                        <p class="title is-1 has-text-right"><i class="fas fa-check-double"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <p class="title is-1 has-text-left mt-6">成員<span class="has-text-link">TEAM</span></p>
    <p class="title is-4 has-text-right">不斷嘗試各種可能</p>
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
                        <button class="button is-link mt-6" style="min-height: 100px; border-radius: 15px;" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}contact')" class="button is-white is-fullwidth is-large">
                            <div class="columns">
                                <div class="column">
                                    <p class="title is-6">
                                        聊聊吧
                                        <i class="fas fa-arrow-right ml-1"></i>
                                    </p>
                                </div>
                            </div>
                        </button>
                        <button class="button is-primary mt-6" style="min-height: 100px; border-radius: 15px;" onclick="location.href='https\://dev.studio-44s.tw/'" class="button is-white is-fullwidth is-large">
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
</div>
<script id="mainScript">
var typed = new Typed("#titleText", {
    strings:["關於<span class=\"has-text-link\">ABOUT</span>",],
    stringsElement: '#typed-strings',
    typeSpeed: 70,
    startDelay: 2000,
    loop: false,
});
</script>
@endsection
