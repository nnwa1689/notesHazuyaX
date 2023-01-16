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
@if(!empty($data))
@foreach($data as $post)
<div class="box is-post" onclick="window.location.href='{{$webData['webConfig'][13]->tittle}}post/{{$post->PostId}}'">
        <div class="columns">
            <div class="column is-one-quarter" style="font-size: 150px; color: #DEF1FF; text-align: center;";>
            @if(isset($post->CoverImage) && !empty($post->CoverImage))
                <img style="" src="{{$post->CoverImage}}">
            @else
                <i class="far fa-image"></i>
            @endif
            </div>
            <div class="column">
                <p class="title is-4">{{$post->PostTittle}}</p>
                <p class="subtitle limit3rows" style="margin-bottom: 0.75rem">{{ strip_tags(\Illuminate\Support\Str::limit($post->PostContant, 400, $end='......')) }}</p>
                <nav class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <a class="tag is-link" href="{{$webData['webConfig'][13]->tittle}}category/{{$post->ClassId}}">{{$post->Classes}}</a>
                        </div>
                        <div class="level-item">
                            <i class="fas fa-clock"></i>{{$post->PostDate}}
                        </div>
                    </div>
                    <div class="level-right">
                        <div class="level-item">
                            <a href="{{$webData['webConfig'][13]->tittle}}person/{{$post->UserID}}">
                                <figure class="image is-48x48" style="margin-right: 0.75rem;">
                                    <img class="is-rounded" src="/{{$post->Avatar}}">
                                </figure>
                            </a>
                            <a class="subtitle is-6" href="{{$webData['webConfig'][13]->tittle}}person/{{$post->UserID}}">
                                {{$post->User}}
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endforeach
    <br>
    <div class="box">
        {{ $data->links('vendor.pagination.pagSearch') }}
    </div>
@elseif(!isset($_GET['search-text']) || $_GET['search-text']=='')
@else
<div class="box">
    <p>找不到相關結果</p>
</div>
@endif
@endsection
@section('sideBar')
    @parent
@endsection
