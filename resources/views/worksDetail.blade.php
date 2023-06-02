@extends('layout')
@section('title', $title)
@section('breadcrumb')
@parent
<li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
<li><a href="{{$webData['webConfig'][13]->tittle}}works">作品一覽</a></li>
<li class="is-active"><a href="#" aria-current="page">{{$WorkDetail[0]->WorksName}}</a></li>
@endsection
@section('content')
<!--
<div data-scroll data-scroll-speed="2" data-scroll-delay="1.5" class="section has-text-centered mb-3 mt-6">
    <p class="is-size-3">{{$WorkDetail[0]->WorksName}}</p>
    <p class="is-size-5">{{$WorkDetail[0]->Customer}}</p>
    <hr/>
    <p class="is-size-5">{{$WorkDetail[0]->ShortIntro}}</p>
</div>
-->

<section data-scroll data-scroll-speed="3" class="hero is-small p-0 mb-6 mt-1 ml-0 mr-0" style="overflow: hidden;">
    <img src="{{ $WorkDetail[0]->CoverImage }}" style="width: 100%; height: auto; aspect-ratio: 16/9; object-fit: cover; transform: scale(1.50);" data-scroll data-scroll-speed="-3">
</section>

<div class="container is-max-desktop">
    <div class="content">
        {!! $WorkDetail[0] -> Intro !!}
    </div>
    <div class="block has-text-centered mt-6">
        <a href="{{ $WorkDetail[0] -> Url }}" target="_blank" class="button is-primary is-works-button is-multiline is-outlined is-rounded mr-0 mb-6 mt-6">
            作品鑑賞<br/><i class="fas fa-arrow-right"></i>
        </a>
        <p class="title is-4 m-5" data-scroll data-scroll-speed="2" data-scroll-delay="1.5">Presented by</p>
        <div class="columns" data-scroll data-scroll-speed="2" data-scroll-delay="1.5">
            <div class="column is-5 is-justify-content-center" style="margin-left:auto; margin-right: auto;">
                @foreach($WorkDetail as $value)
                @if($value -> StaffName !== "")
                <div class="columns is-variable is-mobile p-0">
                    <div class="column is-4">
                        <div class="image is-96x96">
                            <figure class="image is-1by1">
                                <img class="is-rounded" src="{{$value -> StaffImage}}">
                            </figure>
                        </div>
                    </div>
                    <div class="column is-8">
                        <div class="box">
                            <div class="block p-1 has-text-left">
                                <a class="has-text-weight-bold is-size-6 m-0" href="{{ $value -> StaffUrl }}">{{ $value -> StaffName }}</a>
                                <p class="is-size-6 m-0">{{ $value -> StaffTitle }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <nav class="level mt-6">
            <div class="level-item has-text-centered">
                <div>
                <p class="heading">Works</p>
                <p class="title is-5">{{$WorkDetail[0]->WorksName}}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                <p class="heading">Client</p>
                <p class="title is-5">{{$WorkDetail[0]->Customer}}</p>
                </div>
            </div>
        </nav>
    </div>
</div>
@endsection
