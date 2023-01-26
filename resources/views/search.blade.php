@extends('layout')
@section('title', '搜尋文章 - ')
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li class="is-active"><a href="#" aria-current="page">搜尋文章</a></li>
@endsection
@section('content')
@parent
<section class="hero is-link">
  <div class="hero-body">
    <div class="container" style="text-align: center;">
      <h1 class="title">搜尋文章</h1>
    </div>
  </div>
</section>
<div class="box content">
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
            <button class="button is-link" type="submit" placeholder="search"><i class="fas fa-search"></i>搜尋</button>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </from>
</div>
@if(!empty($data) && count($data) > 0 && strlen($_GET['search-text']) > 0)
    @foreach($data as $post)
        @component('compoments.postitem',
            ['url' => $webData['webConfig'][13]->tittle."post/".$post->PostId,
            'CoverImage' => $post->CoverImage,
            'PostTittle' => $post->PostTittle,
            'PostContant' => $post->PostContant,
            'Category' => $post->Classes,
            'CategoryUrl' => $webData['webConfig'][13]->tittle."category/".$post->ClassId,
            'PostDate' => $post->PostDate,
            'ReadTime' => $post->ReadTime,
            'Author' => $post->User,
            'AuthorAvatarUrl' => $webData['webConfig'][13]->tittle.$post->Avatar,
            'AuthorUrl' => $webData['webConfig'][13]->tittle."person/".$post->UserID
            ])
        @endcomponent
    @endforeach
    <br>
    <div class="box">
        {{ $data->links('vendor.pagination.pagSearch') }}
    </div>
@else
<div class="box">
    <p class="has-text-centered is-size-4">找不到相關結果</p>
</div>
@endif
@endsection
@section('sideBar')
    @parent
@endsection
