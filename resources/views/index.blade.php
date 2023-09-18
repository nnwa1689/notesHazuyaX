@extends('layout')
@section('title', $title)
@section('content')
<div data-scroll class="container mb-6 pt-6 pb-6">
    <div class="columns is-gapless">
        <div class="column is-10">
            <p class="title is-1 has-text-centered-mobile">
                <span>Warmth.</span>
            </p>
            <p class="title is-1 has-text-centered-mobile">
                <span>Relaxed.</span>
            </p>
            <p class="title is-1 has-text-centered-mobile">
                <span class="has-text-background-primary">Original.</span>
            </p>
        </div>
        <div class="column has-text-centered">
            <p id="hour" class="title is-1 has-text-primary has-text-shadow mt-5">14</p>
            <p id="dot" class="title is-3 has-text-link has-text-shadow">
                <i class="fas fa-circle mb-5"></i>
                <br/>
                <i class="fas fa-circle"></i>
            </p>
            <p id="min" class="title is-1 has-text-primary has-text-shadow">44</p>
        </div>
    </div>
    <div class="is-align-items-center has-text-right has-text-centered-mobile">
        <p class="subtitle is-4 mt-5">
            <i class="fas fa-desktop mr-3"></i> 網站設計、前後端系統開發
        </p>
        <button class="button is-primary is-rounded ml-3" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}contact')">
            Contact Us
            <i class="fas fa-arrow-right ml-1"></i>
        </button>
    </div>

</div>
<div data-scroll data-scroll-speed="1" class="mt-6 mb-3">
    <div class="container mt-6">
        <p class="title is-2">
            <span class="has-text-background-primary">近期作品</span>
        </p>
    </div>
    <div class="container p-3 mt-6">
        <div class="columns is-multiline is-gapless is-mobile is-justify-content-left" style="align-items: end;">
            @php($i = 1)
            @foreach($worksData as $item)
                @component('compoments.WorksItem',
                    ['url' => $webData['webConfig'][13]->tittle."works/".$item -> WorksID,
                    'CoverImage' => $item -> CoverImage,
                    'WorksName' => $item -> WorksName,
                    'i' => $i,
                    ])
                @endcomponent
            @endforeach
        </div>
        <p class="has-text-right">
            <button class="button is-primary is-large mt-6 mb-6 mr-3" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}works')">
                更多作品
                <i class="fas fa-arrow-right ml-1"></i>
            </button>
        </p>
    </div>
</div>

<div data-scroll data-scroll-speed="1" class="mb-6">
    <div class="container">
        <p class="title is-2">
            <span class="has-text-background-link">技術雜記</span>
        </p>
    </div>
    <div class="container p-3 mt-5">
        <div class="columns is-multiline">
            @foreach($allPosts as $post)
                @component('compoments.postitem',
                    ['url' => $webData['webConfig'][13]->tittle."blog/".$post->PostId,
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
        <button class="button is-link mt-6 mb-6 is-large" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}blog')">
            更多雜記
            <i class="fas fa-arrow-right ml-1"></i>
        </button>
    </div>
</div>

<div class="container">
    <button data-scroll class="button is-fullwidth is-large is-link mt-6 p-6" style="min-height: 100px;" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}contact')">
        Contact Us
        <i class="fas fa-arrow-right ml-2"></i>
    </button>
</div>
<script>indexInit();</script>
@endsection
@section('content')
@endsection
