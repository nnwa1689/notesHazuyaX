@extends('layout')
@section('title', $title)
@section('breadcrumb')
    @parent
    <li class="is-active"><a href="#"><i class="fas fa-home"></i>首頁</a></li>
@endsection
@section('content')
    <div class="columns is-gapless">
        <div class="column is-9">
            @if($webData['webConfig'][26]->tittle !== "")
            <div class="is-homeBanner mb-2">
                <a href="{{$webData['webConfig'][13]->tittle.$webData['webConfig'][25]->tittle}}"><img alt="{{$webData['webConfig'][25]->tittle}}" class="post-cover" src="{{$webData['webConfig'][13]->tittle.$webData['webConfig'][26]->tittle}}"></a>
            </div>
            @endif
            @if($webData['webConfig'][28]->tittle !== "")
            <div class="is-homeBanner mb-2">
                <a href="{{$webData['webConfig'][13]->tittle.$webData['webConfig'][27]->tittle}}"><img alt="{{$webData['webConfig'][27]->tittle}}" class="post-cover" src="{{$webData['webConfig'][13]->tittle.$webData['webConfig'][28]->tittle}}"></a>
            </div>
            @endif
        </div>
        <div class="column">
            <div style="height:320px;" class="box">
                <p class="title is-5"><i class="fas fa-newspaper mr-1"></i>找公告</p>
                @foreach($webData['homePost'] as $hp)
                <a href="{{$webData['webConfig'][13]->tittle}}whatsnews/{{$hp->PostId}}">{{$hp->PostTittle}}</a>
                <p class="subtitle is-6">{{$hp->PostDate}}</p>
                <hr>
                @endforeach
                <button onclick="location.href='{{$webData['webConfig'][13]->tittle}}whatsnews'" class="button is-link is-outlined is-fullwidth">更多公告</button>
            </div>
        </div>
    </div>
    <div data-scroll data-scroll-speed="1" data-scroll-delay="1.5" style="margin-left:-0.75rem; margin-right:-0.75rem;" class="columns is-multiline mt-2">
        @foreach($allPosts as $post)
            @component('compoments.IndexPostitem',
                ['url' => $webData['webConfig'][13]->tittle."post/".$post->PostId,
                'CoverImage' => $post->CoverImage,
                'PostTittle' => $post->PostTittle,
                'PostContant' => $post->PostContant,
                'Category' => $post->ClassName,
                'CategoryUrl' => $webData['webConfig'][13]->tittle."category/".$post->ClassId,
                'PostDate' => $post->PostDate,
                'ReadTime' => $post->ReadTime,
                'Author' => $post->Yourname,
                'AuthorAvatarUrl' => $webData['webConfig'][13]->tittle.$post->Avatar,
                'AuthorUrl' => $webData['webConfig'][13]->tittle."person/".$post->UserID
                ])
            @endcomponent
        @endforeach
        <span></span>
    </div>
    <div class="is-homeBanner">
        <button style="min-height: 100px; border-radius: 15px;" onclick="location.href='{{$webData['webConfig'][13]->tittle}}post'" class="button is-white is-fullwidth is-large">
            <div class="columns">
                <div class="column">
                    <p class="title is-3">
                        更多文章
                        <i class="fas fa-arrow-right ml-1"></i>
                    </p>
                </div>
            </div>
        </button>
    </div>
    <div class="columns is-multiline is-mobile" style="margin-left: -1rem; margin-right: -1rem; align-items: end;">
        @php($i = 1)
        @foreach($worksData as $item)
        <div data-scroll data-scroll-speed="3" data-scroll-delay="1.5" onclick="window.location.href='works/{{$item -> WorksID}}'" class="is-WorksItem {{ ($i == 2) || $i == 3 ? 'is-works-item-min' : 'is-works-item-large' }}">
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
    <div class="is-homeBanner">
        <button style="min-height: 100px; border-radius: 15px;" onclick="location.href='{{$webData['webConfig'][13]->tittle}}works'" class="button is-white is-fullwidth is-large">
            <div class="columns">
                <div class="column">
                    <p class="title is-3">
                        更多作品
                        <i class="fas fa-arrow-right ml-1"></i>
                    </p>
                </div>
            </div>
        </button>
    </div>

@endsection
