@extends('layout')
@section('title', $title)
@section('content')
<div data-scroll data-scroll-speed="-1" data-scroll-delay="0" class="mb-6 mt-3">
    <p class="title is-1 has-text-left">
        <span id="titleText"></span>
    </p>
    <p class="is-size-5">{{$allPosts[0]->Short_Intro}}</p>
</div>

<div class="tabs is-centered is-medium is-fullwidth">
    <!--
    <ul>
        <li class="is-active">
        <a>
            <span class="icon is-small"><i class="fas fa-list-alt"></i></span>
            <span>文章列表</span>
        </a>
        </li>
        <li>
        <a href="/category/{{ $allPosts[0]->ClassId }}/intro">
            <span class="icon is-small"><i class="fas fa-info"></i></span>
            <span>系列介紹</span>
        </a>
        </li>
    </ul>
    -->
</div>
<div class="columns is-multiline is-mobile is-gapless is-justify-content-center" style="margin-left: -1rem; margin-right: -1rem;">
@foreach($allPosts as $post)
    @component('compoments.postitem',
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
</div>
<div class="block">
    {{ $allPosts->links('vendor.pagination.default') }}
</div>
<p></p>
<script>
    var typed = new Typed("#titleText", {
        strings:["{{$allPosts[0]->ClassName}}",],
        stringsElement: '#typed-strings',
        typeSpeed: 70,
        startDelay: 2000,
        loop: false,
    });
</script>
@endsection
