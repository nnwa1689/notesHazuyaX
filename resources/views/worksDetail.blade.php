@extends('layout')
@section('title', $title)
@section('breadcrumb')
@parent
<li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
<li><a href="{{$webData['webConfig'][13]->tittle}}works">作品一覽</a></li>
<li class="is-active"><a href="#" aria-current="page">{{$WorkDetail[0]->WorksName}}</a></li>
@endsection
@section('content')
    <div class="container mt-1 mb-5">
        <div class="block">
            <p class="title has-text-left has-text-centered-mobile is-3">{{$WorkDetail[0]->WorksName}}</p>
            <nav class="level m-0">
                <div class="column is-multiple is-gapless level-left pl-0 pr-5">
                    <p class="title has-text-left has-text-centered-mobile is-5 mb-6">{{$WorkDetail[0]->Customer}}</p>
                    <p class="subtitle has-text-left has-text-centered-mobile is-5">{{$WorkDetail[0]->ShortIntro}}</p>
                </div>
                <div class="level-right has-tex-right has-text-centered-mobile">
                    <a data-scroll data-scroll-speed="2" data-scroll-delay="1.5" href="{{ $WorkDetail[0] -> Url }}" target="_blank" class="button is-primary is-works-button is-multiline is-outlined is-rounded">
                        查看網站<br/><i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </nav>
        </div>
    </div>
    <hr/>
    <div class="columns is-gapless">
        <div class="column mt-2 mr-4">
            @foreach($WorkDetail as $value)
            @if($value -> StaffName !== "")
            <article class="media mb-4">
                <figure class="media-left">
                    <p class="image is-48x48">
                    <img class="is-rounded" src="{{$value -> StaffImage}}">
                    </p>
                </figure>
                <div class="media-content">
                    <p>
                        <a class="has-text-weight-bold is-size-6 m-0" href="{{ $value -> StaffUrl }}">{{ $value -> StaffName }}</a>
                        <p class="is-size-6 m-0">{{ $value -> StaffTitle }}</p>
                    </p>
                </div>
            </article>
            @endif
            @endforeach
        </div>
        <div class="column is-9">
            <div class="content">
                {!! $WorkDetail[0] -> Intro !!}
            </div>
        </div>
    </div>

    <p></p>
@endsection
