@extends('layout')
@section('title', $title)
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li><a href="{{$webData['webConfig'][13]->tittle}}/post">所有文章</a></li>
    <li class="is-active"><a href="#" aria-current="page">{{$detail[0]->ClassName}}</a></li>
@endsection
@section('content')
    <div class="container mt-1 mb-5">
        <div class="block">
            <nav class="level">
                <div class="level-left">
                    <div class="level-item">
                        <p class="title has-text-left is-3">{{$detail[0]->ClassName}}</p>
                    </div>
                </div>
                <div class="level-right">
                    <div class="level-item">
                        <p class="is-size-6"><i class="fas fa-book"></i>&nbsp;共 {{ $count }} 篇文章閱讀</p>
                    </div>
                </div>
            </nav>
            <p class="subtitle has-text-left is-5">{{$detail[0]->Short_Intro}}</p>
        </div>
    </div>
    <div class="tabs is-centered is-medium is-fullwidth">
        <ul>
            <li class="is-active">
            <a>
                <span class="icon is-small"><i class="fas fa-info"></i></span>
                <span>系列／分類介紹</span>
            </a>
            </li>
            <li>
            <a href="/category/{{ $detail[0]-> ClassId }}/all">
                <span class="icon is-small"><i class="fas fa-list-alt"></i></span>
                <span>文章列表</span>
            </a>
            </li>
        </ul>
    </div>
    <div class="box content">
        {!! $detail[0] -> Long_Intro !!}
    </div>
    <p></p>
@endsection
