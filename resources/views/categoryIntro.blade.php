@extends('layout')
@section('title', $title)
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li><a href="{{$webData['webConfig'][13]->tittle}}/post">所有文章</a></li>
    <li class="is-active"><a href="#" aria-current="page">{{$detail[0]->ClassName}}</a></li>
@endsection
@section('content')
<div data-scroll data-scroll-speed="-1" data-scroll-delay="0" class="mb-6 mt-3">
    <p class="title is-1 has-text-left">{{$detail[0]->ClassName}}</p>
    <p class="is-size-5">{{$detail[0]->Short_Intro}}</p>
</div>
<div class="tabs is-centered is-medium is-fullwidth">
    <ul>
        <li>
        <a href="/category/{{ $detail[0]-> ClassId }}/">
            <span class="icon is-small"><i class="fas fa-list-alt"></i></span>
            <span>文章列表</span>
        </a>
        </li>
        <li class="is-active">
        <a>
            <span class="icon is-small"><i class="fas fa-info"></i></span>
            <span>系列介紹</span>
        </a>
        </li>
    </ul>
</div>
<div class="container is-max-desktop content">
    {!! $detail[0] -> Long_Intro !!}
</div>
<p></p>
@endsection
