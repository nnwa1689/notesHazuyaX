@extends('layout')
@section('title', $title)
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li class="is-active"><a href="#" aria-current="page">作品一覽</a></li>
@endsection
@section('content')
<div data-scroll data-scroll-speed="-1" data-scroll-delay="0" class="mb-3 mt-3">
    <p class="title is-1 has-text-left"><span id="titleText"></span></p>
</div>
<script>
    var typed = new Typed("#titleText", {
        strings:["作品集<span class=\"has-text-link pl-2\">Works</span>",],
        stringsElement: '#typed-strings',
        typeSpeed: 70,
        startDelay: 2000,
        loop: false,
    });
</script>
<div class="columns is-multiline is-mobile is-justify-content-center" style="margin-left: -1rem; margin-right: -1rem; align-items: end;">
@php($i = 1)
@foreach($WorksList as $item)
    <div data-scroll data-scroll-speed="{{($i == 2) || $i == 3 ? '3' : '5'}}" data-scroll-delay="1.5" onclick="window.location.href='works/{{$item -> WorksID}}'" class="is-WorksItem {{ ($i == 2) || $i == 3 ? 'is-works-item-min' : 'is-works-item-large' }}">
        <img class="image" style="max-width:1000px; max-height:1000px;" src="{{$item -> CoverImage}}">
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

