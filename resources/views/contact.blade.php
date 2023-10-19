@extends('layout')
@section('title', '聊聊天 - ')
@section('content')
<div class="container">
    <div data-scroll data-scroll-speed="-1" data-scroll-delay="0" class="mb-4">
        <p class="title is-1 has-text-left">
            <span id="titleText"></span>
        </p>
    </div>
    <div class="pt-6">
        <div class="columns">
            <div class="column pr-5">
                <p class="title is-5 has-text-left has-text-centered-mobile">
                    Follow Us
                </p>
                <div class="block has-text-left has-text-centered-mobile">
                    @if(strlen($webData['webConfig'][22]->tittle) > 0)
                        <a href="{{$webData['webConfig'][22]->tittle}}" target="_blank">
                            <button class="button is-link is-medium is-rounded mr-2">
                                <i class="fab fa-twitter"></i>
                            </button>
                        </a>
                    @endif
                    @if(strlen($webData['webConfig'][21]->tittle) > 0)
                        <a href="{{$webData['webConfig'][21]->tittle}}" target="_blank">
                            <button class="button is-link is-medium is-rounded mr-2">
                                <i class="fab fa-instagram-square"></i>
                            </button>
                        </a>
                    @endif
                    @if(strlen($webData['webConfig'][20]->tittle) > 0)
                        <a href="{{$webData['webConfig'][20]->tittle}}" target="_blank">
                            <button class="button is-link is-medium is-rounded mr-2">
                                <i class="fab fa-facebook"></i>
                            </button>
                        </a>
                    @endif
                    @if(strlen($webData['webConfig'][23]->tittle) > 0)
                        <a href="{{$webData['webConfig'][23]->tittle}}" target="_blank">
                            <button class="button is-link is-medium is-rounded mr-2">
                                <i class="fab fa-apple"></i>
                            </button>
                        </a>
                    @endif
                    @if(strlen($webData['webConfig'][24]->tittle) > 0)
                        <a href="{{$webData['webConfig'][24]->tittle}}" target="_blank">
                            <button class="button is-link is-medium is-rounded mr-2">
                                <i class="fab fa-google"></i>
                            </button>
                        </a>
                    @endif
                </div>
                <p class="has-text-left has-text-centered-mobile">
                    <a href="mailto:studio44s.tw@gmail.com"><i class="fas fa-envelope mr-2"></i>studio44s.tw@gmail.com</a>
                </p>
                <!--
                <p class="title is-1 has-text-left">
                    <i class="fas fa-comment-dots"></i>
                </p>
                <p class="title is-4 has-text-left has-text-link">常見問答</p>

                <div class="container">
                    <p class="has-text-weight-bold">Q1.提供什麼內容，可以加快我們需求評估的速度？</p>
                    <p class="ml-5">A1.可提供初步的「網頁架構圖」、「時程與預算」、「類似風格的網站」</p>
                </div>

                <div class="container mt-5">
                    <p class="has-text-weight-bold">Q2.資料須在何時提供？</p>
                    <p class="ml-5">A2.在初步評估時就需要提供，由於網頁設計以資料呈現為主，資料內容的不同會影響最後呈現的方式！另外事前提供資料，也能讓我們評估內部是否有足夠的能力呈現，避免最終做出較不符合期待的作品。</p>
                </div>

                <div class="container mt-5">
                    <p class="has-text-weight-bold">Q3.那素材須在何時提供？</p>
                    <p class="ml-5">A3.由於目前沒辦法協助設計品牌識別，僅能提供網站配色的設計建議（若能提供品牌配色，就盡可能依照品牌配色來設計），因此有關品牌或議題等素材建議初步評估時就能大致上提供，以利找尋最好的呈現方式唷！</p>
                </div>

                <div class="container mt-5">
                    <p class="has-text-weight-bold">Q4.正式簽約或開始製作前可以提供預覽嗎？</p>
                    <p class="ml-5">A4.雖然無法提供高精度的設計草稿，但於初步規劃時就可以與您討論出粗略的呈現方式囉！</p>
                </div>
                -->

            </div>
            <div class="column is-8">
                <div class="columns">
                    <div class="column is-6">
                        <p class="is-size-5 mb-2"><span class="has-text-background-primary">嗨</span>，我叫做</p>
                        <input class="input is-large is-fullwidth" id="Name" type="text" name="Name" value="">
                        <p id="name_danger" class="help is-danger" style="display: none;">*這要填唷</p>
                        <p class="is-size-6 mt-1">我們該如何稱呼您？</p>
                    </div>
                    <div class="column">
                        <p class="is-size-5 mb-2">以下是我的<span class="has-text-background-primary">Email</span></p>
                        <input class="input is-large is-fullwidth" type="text" name="Email" id="Email" value="">
                        <p id="email_danger" class="help is-danger" style="display: none;">*這要填唷</p>
                        <p class="is-size-6 mt-1">提供一個可以聯繫的E-mail</p>
                    </div>
                </div>

                <div class="columns">
                    <div class="column is-6">
                    <p class="is-size-5 mb-2">我<span class="has-text-background-primary">需要．．．</span></p>
                        <div class="select is-large is-fullwidth">
                            <select name="Type" id="Type">
                                <option value="web_design">網站(頁)系統開發設計</option>
                                <option value="custom_service">舊有網站維護</option>
                                <option value="post_service">雜記文章問題</option>
                                <option value="business">合作提案</option>
                                <option value="devgallery_submit">44's Gallery 相關</option>
                                <option value="other">其他</option>
                            </select>
                        </div>
                        <p class="is-size-6 mt-1">請選取本次洽詢業務，若無請選其他後詳述。</p>
                    </div>
                    <div class="column">
                        <p class="is-size-5 mb-2">而我的<span class="has-text-background-primary">預算</span>是</p>
                        <div class="select is-large is-fullwidth">
                            <select name="BudgetRanges" id="BudgetRanges">
                                <option value="L2">NTD$10,000 - $30,000</option>
                                <option value="L3">NTD$30,001 - $50,000</option>
                                <option value="L4">NTD$50,001 - $70,000</option>
                                <option value="L5">NTD$70,001 - $100,000</option>
                                <option value="L6">NTD$100,001 UP</option>
                                <option value="L1">其他(業務無預算問題、預算不在上面etc.)</option>
                            </select>
                        </div>
                        <p class="is-size-6 mt-1">想要在這裡花多少＄？</p>
                    </div>
                </div>

                <div class="columns">
                    <div class="column is-12">
                        <p class="is-size-5 mb-2">我想要對你們<span class="has-text-background-primary">說</span></p>
                        <textarea class="textarea" name="Content" id="Content" cols="50" rows="20" value=""></textarea>
                        <p id="Content_danger" class="help is-danger" style="display: none;">*這要填唷</p>
                        <p class="is-size-6 mt-1">詳述您的需要，讓我們知道您的想法！如：想要的風格、文案、類似的網站、大致的網站地圖、圖片素材等，附件可附 Google 雲端連結</p>
                    </div>
                </div>

                <div class="columns">
                    <div class="column is-12">
                        <article class="notification is-danger mt-5 mb-5" id="err" style="display: none;">
                            <div class="content">請檢查資料是否遺漏或 E-Mail 格式錯誤。</div>
                        </article>
                    </div>

                    <div class="column is-12">
                        <article class="notification is-success mt-5 mb-5" id="suc" style="display: none;">
                            <div class="content">嗨，我們已經收到您的訊息囉！請靜待我們的回覆。<br/>歡迎先去其他地方看看唷！</div>
                        </article>
                    </div>
                </div>

                <p id="is-done-after" style="display:none;">
                    <a href="{{$webData['webConfig'][13]->tittle}}works" id="see_works_btn" class="button is-primary is-medium is-fullwidth mt-5">
                        看作品<i class="fas fa-chevron-right"></i>
                    </a>
                    <a href="{{$webData['webConfig'][13]->tittle}}blog" id="see_blogs" class="button is-link is-medium is-fullwidth mt-5">
                        看文章<i class="fas fa-chevron-right"></i>
                    </a>
                </p>

                <p>
                    <button id="submit_btn" type="button" onclick="submit()" class="button is-primary is-medium is-fullwidth is-rounded mt-5">
                        <i class="fas fa-paper-plane mr-2"></i>SEND!!
                    </button>
                </p>

            </div>
        </div>
    </div>
</div>
<script>contactInit();</script>
@endsection
