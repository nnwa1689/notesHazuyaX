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
        <article class="notification is-danger mt-5 mb-5 is-medium" id="error" style="display: none;">
            <div class="content">
            資料填寫有誤，請重新檢查！
            </div>
        </article>

        <article class="notification is-success mt-5 mb-5 is-medium" id="suc" style="display: none;">
            <div class="content">
            資料已經送出囉！請靜待我們的回覆～
            </div>
        </article>
        <div class="columns">
            <div class="column is-8">
                <p class="title is-4 mt-6"><span class="has-text-link">嗨</span>，我叫做</p>
                <input class="input is-large is-fullwidth" id="Name" type="text" name="Name" value="">
                <p class="subtitle is-5 mt-3">我們該如何稱呼您？</p>
                <p class="title is-4 mt-6">我<span class="has-text-link">想要</span></p>
                <div class="select is-large is-fullwidth">
                    <select name="Type" id="Type">
                        <option value="web_design">網站設計與系統規劃</option>
                        <option value="custom_service">網站保固與維護</option>
                        <option value="devgallery_submit">DevGallery網站提交</option>
                        <option value="post_service">文章或版權問題</option>
                        <option value="business">合作提案</option>
                        <option value="other">其他</option>
                    </select>
                </div>
                <p class="subtitle is-5 mt-3">您需要的服務項目是？</p>

                <p class="title is-4 mt-6">而我的<span class="has-text-link">預算</span>是</p>
                <div class="select is-large is-fullwidth">
                    <select name="BudgetRanges" id="BudgetRanges">
                        <option value="L1">NTD$2,500 - $5,000</option>
                        <option value="L2">NTD$5,001 - $7,500</option>
                        <option value="L3">NTD$7,501 - $10,000</option>
                        <option value="L4">NTD$10,001 - $30,000</option>
                        <option value="L5">NTD$30,001 - $50,000</option>
                        <option value="L6">NTD$50,001 - $100,000</option>
                    </select>
                </div>
                <p class="subtitle is-5 mt-3">如果您需要估價，您的預算是？</p>

                <p class="title is-4 mt-6">我想要對你們<span class="has-text-link">說</span></p>
                <textarea class="textarea" name="Content" id="Content" cols="50" rows="20" value=""></textarea>
                <p class="subtitle is-5 mt-3">請詳述您的需求，若有附件可附上 Google 雲端硬碟連結</p>

                <p class="title is-4 mt-6">以下是我的<span class="has-text-link">Email</span></p>
                <input class="input is-large is-fullwidth" type="text" name="Email" id="Email" value="">
                <p class="subtitle is-5 mt-3">請提供一個可以聯繫的E-mail</p>

                <p class="title is-4 mt-6">你們可以透過它跟我聯繫</p>
            </div>
            <div class="column">
                <p class="title is-1">
                    <lottie-player
                        src="{{$webData['webConfig'][13]->tittle}}/lf30_t6fy5r4g.json"
                        background="transparent"
                        speed="1"
                        style="width: 100%; margin-right:auto; margin-left:auto;"
                        loop
                        autoplay
                        >
                    </lottie-player>
                </p>
            </div>
        </div>
        <button type="button" onclick="submit()" class="button is-primary is-large is-fullwidth mt-3">我說完了！</button>
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
