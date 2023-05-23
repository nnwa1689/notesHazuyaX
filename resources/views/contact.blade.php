@extends('layout')
@section('title', '聊聊天 - ')
@section('content')
<div data-scroll data-scroll-speed="-1" data-scroll-delay="0" class="mb-4 mt-3">
    <p class="title is-1 has-text-left">聊聊天<span class="has-text-link">CONTACT</span></p>
</div>
<form>
    <div class="columns">
        <div class="column is-2">
            <p class="title is-3"><span class="fas fa-code">&nbsp;</span></p>
        </div>
        <div class="column is-10 has-text-centered">
            <p class="title is-4 mt-6">嗨，我叫做</p>
            <input class="input is-large is-fullwidth" style="" type="text" name="Name" value="">
            <p class="title is-4 mt-6">我想要</p>
            <div class="select is-link is-large is-fullwidth">
                <select name="Type">
                    <option value="web_design">網站設計與系統規劃</option>
                    <option value="custom_service">網站保固與維護</option>
                    <option value="devgallery_submit">DevGallery網站提交</option>
                    <option value="post_service">文章或版權問題</option>
                    <option value="business">合作提案</option>
                    <option value="other">其他</option>
                </select>
            </div>
 
            <p class="title is-4 mt-6">而我的預算是</p>
            <div class="select is-link is-large is-fullwidth">
                <select name="BudgetRanges">
                    <option value="L1">NTD$2,500 - $5,000</option>
                    <option value="L2">NTD$5,001 - $7,500</option>
                    <option value="L3">NTD$7,501 - $10,000</option>
                    <option value="L4">NTD$10,001 - $30,000</option>
                    <option value="L5">NTD$30,001 - $50,000</option>
                    <option value="L6">NTD$50,001 - $100,000</option>
                </select>
            </div>
            <p class="title is-4 mt-6">我想要對你們說</p>
            <textarea name="Content" cols="139" rows="30" value=""></textarea>
            <p class="title is-4 mt-6">以下是我的Email</p>
            <input class="input is-large is-fullwidth" style="" type="text" name="Email" value="">
            <p class="title is-4 mt-6">你們可以透過它跟我聯繫</p>
        </div>
    </div>    
</form>
@endsection
