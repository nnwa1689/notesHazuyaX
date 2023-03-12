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
    <div class="columns is-multiline is-mobile" style="margin-left: -1rem; margin-right: -1rem; align-items: end;">
    @php($i = 1)
    @foreach($WorksList as $item)
    <div data-scroll data-scroll-speed="3" data-scroll-delay="1.5" onclick="window.location.href='works/{{$item -> WorksID}}'" class="is-WorksItem {{ ($i == 2) || $i == 3 ? 'is-works-item-min' : 'is-works-item-large' }}">
        <img class="image" src="{{$item -> CoverImage}}">
        <a class="button works-image-tag is-primary is-outlined is-rounded is-medium">
            <span>{{$item -> WorksName}}</span>
        </a>
    </div>
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
@endsection
@section('sidebar')
@parent
@endsection

