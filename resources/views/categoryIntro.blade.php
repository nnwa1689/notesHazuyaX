@extends('layout')
@section('title', $title)
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li><a href="{{$webData['webConfig'][13]->tittle}}/post">所有文章</a></li>
    <li class="is-active"><a href="#" aria-current="page">{{$detail[0]->ClassName}}</a></li>
@endsection
@section('content')
<div data-scroll data-scroll-speed="2" data-scroll-delay="1.5" class="section has-text-centered mb-3 mt-6">
    <p class="is-size-3">{{$detail[0]->ClassName}}</p>
    <p class="is-size-6"><i class="fas fa-book"></i>&nbsp;共 {{ $count }} 篇文章閱讀</p>
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
<div class="content">
    {!! $detail[0] -> Long_Intro !!}
</div>
<p></p>
@endsection
