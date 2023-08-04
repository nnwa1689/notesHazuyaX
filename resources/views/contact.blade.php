@extends('layout')
@section('title', '聊聊天 - ')
@section('content')
<div class="container">
    <div data-scroll data-scroll-speed="-1" data-scroll-delay="0" class="mb-4 mt-3">
        <p class="title is-1 has-text-left">
            <span id="titleText"></span>
        </p>
    </div>
    <div class="pt-4">
        <div class="columns">
            <div class="column is-7">
                <p class="title is-4 mt-6"><span class="has-text-link">嗨</span>，我叫做</p>
                <input class="input is-large is-fullwidth" id="Name" type="text" name="Name" value="">
                <p class="subtitle is-5 mt-3">我們該如何稱呼您？</p>
                <p class="title is-4 mt-6">我<span class="has-text-link">需要．．．</span></p>
                <div class="select is-large is-fullwidth">
                    <select name="Type" id="Type">
                        <option value="web_design">網站設計與系統規劃</option>
                        <option value="custom_service">網站保固與維護服務</option>
                        <option value="post_service">文章或版權問題</option>
                        <option value="business">合作提案</option>
                        <option value="devgallery_submit">44's Gallery網站提交</option>
                        <option value="other">其他</option>
                    </select>
                </div>
                <p class="subtitle is-5 mt-3">您需要的服務項目是？</p>

                <p class="title is-4 mt-6">而我的<span class="has-text-link">預算</span>是</p>
                <div class="select is-large is-fullwidth">
                    <select name="BudgetRanges" id="BudgetRanges">
                        <option value="L2">NTD$5,000 - $7,500</option>
                        <option value="L3">NTD$7,501 - $10,000</option>
                        <option value="L4">NTD$10,001 - $30,000</option>
                        <option value="L5">NTD$30,001 - $50,000</option>
                        <option value="L6">NTD$50,001 - $100,000</option>
                    </select>
                </div>
                <p class="subtitle is-5 mt-3">請選取您可以接受的預算</p>

                <p class="title is-4 mt-6">我想要對你們<span class="has-text-link">說</span></p>
                <textarea class="textarea" name="Content" id="Content" cols="50" rows="20" value=""></textarea>
                <p class="subtitle is-5 mt-3">請詳述您的需求，讓我們知道您的想法！若有附件可附上 Google 雲端硬碟連結</p>

                <p class="title is-4 mt-6">以下是我的<span class="has-text-link">Email</span></p>
                <input class="input is-large is-fullwidth" type="text" name="Email" id="Email" value="">
                <p class="subtitle is-5 mt-3">請提供一個可以聯繫的E-mail</p>

                <article class="notification is-danger mt-5 mb-5 is-medium" id="error" style="display: none;">
                    <div class="content">
                    奧，有一些資料沒有填到，再檢查一下！
                    </div>
                </article>

                <article class="notification is-success mt-5 mb-5 is-medium" id="suc" style="display: none;">
                    <div class="content">
                    嗨，我們已經收到您的訊息囉！請靜待我們的回覆～
                    </div>
                </article>
                <p class="has-text-right">
                    <button type="button" onclick="submit()" class="button is-primary is-large mt-3">快！立即送出我的訊息！</button>
                </p>
                
            </div>
            <div class="column pl-5">
                <p class="title is-1">
                    <i class="fas fa-comment-dots"></i>
                    <!--
                    <lottie-player
                        src="{{$webData['webConfig'][13]->tittle}}/lf30_t6fy5r4g.json"
                        background="transparent"
                        speed="1"
                        style="width: 100%; margin-right:auto; margin-left:auto;"
                        loop
                        autoplay
                        >
                    </lottie-player>
                    -->
                </p>
                <p class="title is-3">常見問答</p>
                <div class="container">
                    <p class="has-text-weight-bold">Q1.提供什麼內容，可以加快我們需求評估的速度？</p>
                    <p class="ml-5">A1.可提供初步的「網頁架構圖」、「時程與預算」、「類似風格的網站」</p>
                </div>

                <div class="container mt-3">
                    <p class="has-text-weight-bold">Q2.資料須在何時提供？</p>
                    <p class="ml-5">A2.在初步評估時就需要提供，由於網頁設計以資料呈現為主，資料內容的不同會影響最後呈現的方式！另外事前提供資料，也能讓我們評估內部是否有足夠的能力呈現，避免最終做出較不符合期待的作品。</p>
                </div>

                <div class="container mt-3">
                    <p class="has-text-weight-bold">Q3.那素材須在何時提供？</p>
                    <p class="ml-5">A3.由於目前沒辦法協助設計品牌識別，僅能提供網站配色的設計建議（若能提供品牌配色，就盡可能依照品牌配色來設計），因此有關品牌或議題等素材建議初步評估時就能大致上提供，以利找尋最好的呈現方式唷！</p>
                </div>

                <div class="container mt-3">
                    <p class="has-text-weight-bold">Q4.正式簽約或開始製作前可以提供預覽嗎？</p>
                    <p class="ml-5">A4.雖然無法提供高精度的設計草稿，但於初步規劃時就可以與您討論出粗略的呈現方式囉！</p>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    var typed = new Typed("#titleText", {
        strings:["聊聊天<span class=\"has-text-link\">CONTACT</span>",],
        stringsElement: '#typed-strings',
        typeSpeed: 70,
        startDelay: 2000,
        loop: false,
    });
</script>
@endsection
