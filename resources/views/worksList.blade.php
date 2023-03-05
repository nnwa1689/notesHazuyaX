@extends('layout')
@section('title', $title)
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li class="is-active"><a href="#" aria-current="page">作品一覽</a></li>
@endsection
@section('content')
    <div class="container mt-1 mb-5">
        <div class="block">
            <nav class="level mb-3">
                <div class="level-left">
                    <div class="level-item">
                        <p class="title has-text-left is-3">作品一覽</p>
                    </div>
                </div>
                <div class="level-right">
                    <p class="subtitle has-text-link has-text-right has-text-centered-mobile is-3">Works</p>
                </div>
            </nav>
            <p class="subtitle has-text-left has-text-centered-mobile is-5">午後的歡笑之中，大家突然回憶起了這段時間小夥伴們一起經歷了什麼！</p>
        </div>
    </div>
    <hr/>
    <div class="columns is-multiline is-mobile has-text-centered">
    @foreach($WorksList as $item)
        <div onclick="window.location.href='works/{{$item -> WorksID}}'" class="is-WorksItem is-flex-direction-row">
            <a class="worksImage" href="works/{{$item -> WorksID}}">
                <img class="image" src="{{$item -> CoverImage}}">
            </a>
            <div class="subtitle is-5 m-0">{{$item -> WorksName}}</div>
            <div class="subtitle is-6 mt-2">{{$item -> Customer}}</div>
        </div>
    @endforeach
    </div>
    <p></p>
@endsection

@section('sidebar')
@parent
@endsection

