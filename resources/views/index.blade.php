@extends('layout')
@section('title', $title)
@section('herocontent')
<style>
    @keyframes rotation {
        0%{transform:rotate(0deg);}
        100%{transform:rotate(359deg);}
    }
    .logo_rotate {
        animation: rotation 2s infinite linear;
        height: 256px; 
        width: 256px; 
        border-radius: 35565px;
    }
</style>
<div data-scroll data-scroll-speed="-5" data-scroll-delay="1" class="container is-fluid mb-6">
    <section class="hero is-large">
        <div class="hero-body">
            <div class="container has-text-centered">
                <p class="title is-1" id="Home">
                    <span class="has-text-primary has-text-shadow">網頁・</span><span class="has-text-link has-text-shadow">設計</span>
                </p>
                <p class="title is-1">
                    <span class="has-text-success has-text-shadow">技術</span><span class="has-text-primary has-text-shadow">＆雜談</span>
                </p>logo_rotatelogo_rotatelogo_rotatelogo_rotatelogo_rotate
                <p class="title is-1">
                    <img class="logo_rotate" src="/uploadfile/e53db5daf5e4da5e19b91d214de5cc17.png">
                </p>
                <p class="is-size-5">
                    <span class="has-text-link"><i class="fas fa-quote-left"></i></span>
                    「44」樂於探索資訊不同的呈現方式，呈現不同的故事內容。技能樹成長中:）。
                    <span class="has-text-link"><i class="fas fa-quote-right"></i></span>
                </p> 
            </div>
        </div>
    </section>
</div>
<div data-scroll data-scroll-speed="2" data-scroll-delay="1.5" class="container is-fluid mt-6">
    <section class="hero is-link is-halfheight">
        <div class="hero-body">
            <div class="">
                <p class="title is-1">
                    設計。作品
                </p>
                <p class="subtitle is-2">
                    看看精選作品
                </p>
            </div>
        </div>
        <div class="container p-3">
            <div class="columns is-multiline is-mobile is-justify-content-center" style="align-items: end;">
                @php($i = 1)
                @foreach($worksData as $item)
                <div data-scroll data-scroll-speed="2.5" data-scroll-delay="1.5" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}works/{{$item -> WorksID}}')" class="is-WorksItem {{ ($i == 2) || $i == 3 ? 'is-works-item-min' : 'is-works-item-large' }}">
                    <img class="image" src="{{$item -> CoverImage}}">
                    <a class="button works-image-tag is-primary is-outlined is-rounded is-medium">
                        <span>{{$item -> WorksName}}</span>
                    </a>
                </div>
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
            <p  data-scroll data-scroll-speed="2" class="subtitle is-2">
                看看不同作品，也可以找我們聊聊！
            </p>
            <button class="button is-primary mt-6 mr-3" style="min-height: 100px; border-radius: 15px;" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}works')" class="button is-white is-fullwidth is-large">
                <div class="columns">
                    <div class="column">
                        <p class="title is-6">
                            更多作品
                            <i class="fas fa-arrow-right ml-1"></i>
                        </p>
                    </div>
                </div>
            </button>
            <button class="button is-link mt-6" style="min-height: 100px; border-radius: 15px;" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}contact')" class="button is-white is-fullwidth is-large">
                <div class="columns">
                    <div class="column">
                        <p class="title is-6">
                            聊聊
                            <i class="fas fa-arrow-right ml-1"></i>
                        </p>
                    </div>
                </div>
            </button>
        </div>
    </section>
</div>
<div data-scroll data-scroll-speed="-1" data-scroll-delay="0" class="container is-fluid mt-6">
    <section class="hero is-success is-halfheight">
        <div class="hero-body">
            <div class="container is-fluid has-text-right">
                <p class="subtitle is-2">
                    為過程做一些紀錄
                </p>
                <p class="title is-1">
                    技術雜記
                </p>
            </div>
        </div>
        <div class="container p-3">
            <div class="columns is-multiline">
                @foreach($allPosts as $post)
                    @component('compoments.IndexPostitem',
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
            <p data-scroll data-scroll-speed="2" class="subtitle is-2">
                    繼續閱讀更多雜紀
            </p>
            <button class="button is-link mt-3 is-large" style="min-height: 100px; border-radius: 15px;" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}post')">
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
<div data-scroll data-scroll-speed="2" data-scroll-delay="1.5" class="container is-fluid mb-6">
    <section class="hero is-black is-medium">
    <div class="hero-body">
        <div class="container has-text-centered">
        <p class="title is-3">
            有想法嗎？來聊聊天吧！
        </p>
        <button class="button is-link mt-6" style="min-height: 100px; border-radius: 15px;" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}contact')" class="button is-white is-fullwidth is-large">
            <div class="columns">
                <div class="column">
                    <p class="title is-6">
                        聊聊
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
    <div class="block">
        @if($webData['webConfig'][26]->tittle == "")
        <div class="is-homeBanner mb-2">
            <a href="{{$webData['webConfig'][13]->tittle.$webData['webConfig'][25]->tittle}}"><img alt="{{$webData['webConfig'][25]->tittle}}" class="is-homeBanner" src="{{$webData['webConfig'][13]->tittle.$webData['webConfig'][26]->tittle}}"></a>
        </div>
        @endif
    </div>
    <div class="block">
        @if($webData['webConfig'][28]->tittle == "")
        <div class="is-homeBanner mb-1">
            <a href="{{$webData['webConfig'][13]->tittle.$webData['webConfig'][27]->tittle}}"><img alt="{{$webData['webConfig'][27]->tittle}}" class="is-homeBanner" src="{{$webData['webConfig'][13]->tittle.$webData['webConfig'][28]->tittle}}"></a>
        </div>
        @endif
    </div>
@endsection
