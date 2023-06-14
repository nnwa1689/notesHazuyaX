@extends('layout')
@section('title', $title)
@section('breadcrumb')
    @parent
    <li class="is-active"><a href="#"><i class="fas fa-home"></i>首頁</a></li>
@endsection
@section('herocontent')
<div data-scroll data-scroll-speed="-5" data-scroll-delay="1" class="container is-fluid mb-6">
    <section class="hero is-large">
    <div class="hero-body">
        <div class="container has-text-centered">
            <p class="title is-1" id="Home">
                網頁・<span class="has-text-link">設計</span>
            </p>
            <p class="title is-1">
                <span class="has-text-success">技術</span>＆雜談
            </p>
            <p class="title is-1">
                <lottie-player
                    src="{{$webData['webConfig'][13]->tittle}}/lf20_wdcziokb.json"
                    background="transparent"
                    speed="1"
                    style="width: 256px; height: 256px; margin-right:auto; margin-left:auto;"
                    loop
                    autoplay
                ></lottie-player>
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
                <div data-scroll data-scroll-speed="2.5" data-scroll-delay="1.5" onclick="barba.go('works/{{$item -> WorksID}}')" class="is-WorksItem {{ ($i == 2) || $i == 3 ? 'is-works-item-min' : 'is-works-item-large' }}">
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
            <button class="button is-link mt-6" style="min-height: 100px; border-radius: 15px;" onclick="location.href='{{$webData['webConfig'][13]->tittle}}contact'" class="button is-white is-fullwidth is-large">
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
            <button class="button is-link mt-3 is-large" style="min-height: 100px; border-radius: 15px;" onclick="location.href='{{$webData['webConfig'][13]->tittle}}post'">
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
        <button class="button is-link mt-6" style="min-height: 100px; border-radius: 15px;" onclick="location.href='{{$webData['webConfig'][13]->tittle}}contact'" class="button is-white is-fullwidth is-large">
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
