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
            <nav class="level mb-3">
                <div class="level-left">
                    <div class="level-item">
                        <p class="title has-text-left has-text-centered-mobile is-3">{{$WorkDetail[0]->WorksName}}</p>
                    </div>
                </div>
                <div class="level-right">
                    <p class="title has-text-left has-text-centered-mobile is-5">{{$WorkDetail[0]->Customer}}</p>
                </div>
            </nav>
            <nav class="level m-0">
                <div class="column is-multiple level-left pl-0">
                    <div class="level-item">
                        <p class="subtitle has-text-left has-text-centered-mobile is-5">{{$WorkDetail[0]->ShortIntro}}</p>
                    </div>
                </div>
                <div class="level-right">
                    <a href="{{ $WorkDetail[0] -> Url }}" target="_blank" class="button is-primary is-outlined is-medium is-fullwidth">看看作品&nbsp;<i class="fas fa-arrow-right"></i></a>
                </div>
            </nav>
        </div>
    </div>
    <hr/>
    <div class="content">
        {!! $WorkDetail[0] -> Intro !!}
    </div>
    <p></p>
@endsection

@section('sidebar')
@parent
<div class="box">
    @foreach($WorkDetail as $value)
    @if($value -> StaffName !== "")
    <article class="media">
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

@endsection

