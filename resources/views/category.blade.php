@extends('layout')
@section('title', $title)
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li><a href="{{$webData['webConfig'][13]->tittle}}/post">所有文章</a></li>
    <li class="is-active"><a href="#" aria-current="page">{{$allPosts[0]->ClassName}}</a></li>
@endsection
@section('content')
<div data-scroll data-scroll-speed="2" data-scroll-delay="1.5" class="section has-text-centered mb-3 mt-6">
    <p class="is-size-3">{{$allPosts[0]->ClassName}}</p>
    <p class="is-size-6"><i class="fas fa-book"></i>&nbsp;共 {{ $count }} 篇文章閱讀</p>
    <p class="is-size-5">{{$allPosts[0]->Short_Intro}}</p>
</div>
<div class="tabs is-centered is-medium is-fullwidth">
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
</div>
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
<div class="box">
    {{ $allPosts->links('vendor.pagination.default') }}
</div>
<p></p>
@endsection
