@extends('layout')
@section('title', $title)
@section('content')
<div class="container mt-6 mb-6">
    <div class="columns is-gapless">
        <div class="column is-9 is-justify-content-end">
            <p class="title is-1 has-text-centered-mobile">
                <span class="has-text-primary">Warmth.</span>
            </p>
            <p class="title is-1 has-text-centered-mobile">
                <span class="has-text-primary">Relaxed.</span>
            </p>
            <p class="title is-1 has-text-centered-mobile">
                <span class="has-text-background-primary">Original.</span>
            </p>
        </div>
        <div class="column has-text-centered is-justify-content-end">
            <p id="hour" class="title is-1 has-text-primary has-text-shadow mt-3">14</p>
            <p id="dot" class="title is-3 has-text-link has-text-shadow">
                <i class="fas fa-circle mb-5"></i>
                <br/>
                <i class="fas fa-circle"></i>
            </p>
            <p id="min" class="title is-1 has-text-primary has-text-shadow">44</p>
        </div>
    </div>
</div>
<div class="mt-6">
    <hr/>
    <div class="container mb-6 mt-6">
        <p class="title is-2 mt-3">
            <span class="has-text-background-primary">近期作品</span>
        </p>
        <p>在每次的作品中呈現一種令人放鬆的體驗，<br/>溫和的顏色、簡單的拼貼，再加上一點動感，讓平凡的資訊加上一些點綴。</p>
    </div>
    <section class="hero is-halfheight">
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

<div class="mt-6">
    <hr/>
    <div class="container mb-6 mt-6">
        <p class="title is-2 mt-3">
            <span class="has-text-background-link">技術雜記</span>
        </p>
        <p>製作祕辛、技術分享</p> 
    </div>

    <section class="hero is-halfheight">
        <div class="container p-3">
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
            <button class="button is-link mt-3 mb-3 is-large" style="min-height: 100px; border-radius: 15px;" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}blog')">
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

<button class="button is-fullwidth is-large is-link mt-6 p-6" style="min-height: 100px; border-radius: 15px;" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}contact')">
    <p class="title is-6 p-6 m-6 has-text-light">
        Contact Us
        <i class="fas fa-arrow-right ml-2"></i>
    </p>
</button>

<script>indexInit();</script>
@endsection
@section('content')
@endsection
