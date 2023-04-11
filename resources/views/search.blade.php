@extends('layout')
@section('title', '搜尋文章 - ')
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li class="is-active"><a href="#" aria-current="page">搜尋文章</a></li>
@endsection
@section('content')
@parent
<div data-scroll data-scroll-speed="-1" data-scroll-delay="0" class="mb-6 mt-3">
    <p class="title is-1 has-text-left">搜尋：{{ !empty($_GET['search-text']) == 1 ? $_GET['search-text'] : "" }}
    </p>
</div>
<div class="content">
    <form id="searchForm" class="field has-addons" action="/search/q" method="get">
        <input class="input" type="hidden" id="page" name="page" value="1">
        <div class="control is-expanded">
            @if(isset($_GET['search-text']) && !empty($_GET['search-text']))
            <input class="input" type="text" name="search-text" value="{{$_GET['search-text']}}">
            @else
            <input class="input" type="text" name="search-text" placeholder="Search......">
            @endif
        </div>
        <div class="control">
            <button class="button is-link is-outlined" type="submit" placeholder="search"><i class="fas fa-search"></i>搜尋</button>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </from>
</div>
@if(!empty($data) && count($data) > 0 && strlen($_GET['search-text']) > 0)
<div class="columns is-multiline is-mobile is-gapless is-justify-content-center" style="margin-left: -1rem; margin-right: -1rem;">
    @foreach($data as $post)
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
    <br>
    <div class="block">
        {{ $data->links('vendor.pagination.pagSearch') }}
    </div>
    <p></p>
@else
<div style="min-height: 300px;">
    <p class="has-text-centered is-size-4">尚無相關結果</p>
</div>
@endif
@endsection
@section('sideBar')
    @parent
@endsection
