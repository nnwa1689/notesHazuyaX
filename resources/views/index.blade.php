@extends('layout')
@section('title', $title)
@section('content')
<style>
    .text_underline {
        border-bottom: 0.25em solid #E86A33;
        box-shadow: 10px 10px 0 0.05em #41644A;
    }
</style>
<div data-scroll data-scroll-speed="-5" data-scroll-delay="1" class="mb-6">
    <section class="hero is-small">
        <div class="hero-body">
            <p class="title is-1 has-text-left has-text-centered-mobile">
                <span class="has-text-link has-text-shadow">Ｗａｒｍｔｈ</span><span class="has-text-primary has-text-shadow">＆</span>
            </p>
            <p class="title is-1 has-text-centered-mobile">
                <span class="has-text-primary has-text-shadow">Ｒｅｌａｘａｔｉｏｎ</span>
            </p>
            <p class="is-size-3 has-text-right">
                <span class="has-text-link"><i class="fas fa-quote-left"></i></span>
                <span class="has-text-primary">設計讓人溫暖且感覺放鬆的資訊閱覽體驗！</span>
                <span class="has-text-link"><i class="fas fa-quote-right"></i></span>
            </p>
        </div>
    </section>
</div>
<div data-scroll data-scroll-speed="2" data-scroll-delay="1" class="mt-3">
    <section class="hero is-link is-shadow is-halfheight">
        <div class="hero-body">
            <div class="">
                <p class="title is-2">近期作品</p>
                <p class="subtitle is-5">期待在每次的作品中呈現一種令人放鬆的體驗，</p>
                <p class="subtitle is-5">溫和的顏色、簡單的拼貼，再加上一點動感，讓平凡的資訊加上一些點綴。</p>
            </div>
        </div>
        <div class="container p-3">
            <div class="columns is-multiline is-mobile is-justify-content-center" style="align-items: end;">
                @php($i = 1)
                @foreach($worksData as $item)
                    @component('compoments.WorksItem',
                        ['url' => $webData['webConfig'][13]->tittle."works/".$item -> WorksID,
                        'CoverImage' => $item -> CoverImage,
                        'WorksName' => $item -> WorksName,
                        'i' => $i,
                        ])
                    @endcomponent
                @if($i == 0)
                @php($i++)
                @elseif($i == 1)
                @php($i++)
                @elseif($i == 2)
                @php($i++)
                @elseif($i == 3)
                @php($i = $i - 3)
                @endif
                @endforeach
            </div>
            <p class="has-text-right">
                <button class="button is-primary mt-6 mb-6 mr-3" style="min-height: 100px; border-radius: 15px;" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}works')" class="button is-white is-fullwidth is-large">
                    <div class="columns">
                        <div class="column">
                            <p class="title is-6">
                                更多作品
                                <i class="fas fa-arrow-right ml-1"></i>
                            </p>
                        </div>
                    </div>
                </button>
            </p>
        </div>
    </section>
</div>
<div data-scroll data-scroll-speed="-1" data-scroll-delay="0" class="mt-3">
    <section class="hero is-success is-shadow is-halfheight">
        <div class="hero-body">
            <div class="container is-fluid has-text-right">
                <p class="subtitle is-5">
                    製作祕辛、技術分享
                </p>
                <p class="title is-2">技術雜記</p>
            </div>
        </div>
        <div class="container p-3">
            <div class="columns is-multiline">
                @foreach($allPosts as $post)
                    @component('compoments.postitem',
                        ['url' => $webData['webConfig'][13]->tittle."post/".$post->PostId,
                        'CoverImage' => $post->CoverImage,
                        'PostTittle' => $post->PostTittle,
                        'PostContant' => $post->PostContant,
                        'Category' => $post->Category->ClassName,
                        'CategoryUrl' => $webData['webConfig'][13]->tittle."category/".$post->ClassId,
                        'PostDate' => $post->PostDate,
                        'ReadTime' => $post->ReadTime,
                        'Author' => $post->Author->Yourname,
                        'AuthorAvatarUrl' => $webData['webConfig'][13]->tittle.$post->Author->Avatar,
                        'AuthorUrl' => ''
                        ])
                    @endcomponent
                @endforeach
            </div>
            <button class="button is-link mt-3 mb-3 is-large" style="min-height: 100px; border-radius: 15px;" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}post')">
                <div class="columns">
                    <div class="column">
                        <p class="title is-6">
                            更多雜記
                            <i class="fas fa-arrow-right ml-1"></i>
                        </p>
                    </div>
                </div>
            </button>
        </div>
    </section>
</div>
<div data-scroll data-scroll-speed="-1" data-scroll-delay="1" class="mt-3 mb-6">
    <section class="hero is-dark is-shadow is-medium">
    <div class="hero-body">
        <div class="container has-text-centered">
        <p class="title is-4">有想法嗎？</p>
        <p class="title is-5">來聊聊吧，也許能有更多不同的想法！</p>
        <button class="button is-link mt-6" style="min-height: 100px; border-radius: 15px;" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}contact')" class="button is-white is-fullwidth is-large">
            <div class="columns">
                <div class="column">
                    <p class="title is-6">
                        走，聊聊！
                        <i class="fas fa-arrow-right ml-1"></i>
                    </p>
                </div>
            </div>
        </button>
        </div>
    </div>
    </section>
</div>
@endsection
@section('content')
@endsection
