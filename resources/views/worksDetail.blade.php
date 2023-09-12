@extends('layout')
@section('title', $title)
@section('breadcrumb')
@parent
<li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
<li><a href="{{$webData['webConfig'][13]->tittle}}works">作品一覽</a></li>
<li class="is-active"><a href="#" aria-current="page">{{$WorkDetail[0]->WorksName}}</a></li>
@endsection
@section('content')
<div class="container is-max-desktop" data-scroll data-scroll-speed="-1">
    <p class="title is-2 has-text-left">
        <span id="titleText"></span>
    </p>
    <div class="columns is-gapless is-mobile">
        <div class="column is-4">
            <p class="subtitle is-3">{{$WorkDetail[0]->WorksID}}</p>
        </div>
        <div class="column">
            <hr/>
            <div class="columns is-gapless">
                <div class="column is-4">
                    <p class="subtitle is-4">Client</p>
                </div> 
                <div class="column">
                    <p class="subtitle is-4">{{$WorkDetail[0]->Customer}}</p>
                </div>
            </div>
            <hr/>
            <div class="columns is-gapless">
                <div class="column is-4">
                    <p class="subtitle is-4">Url</p>
                </div> 
                <div class="column">
                    <p class="subtitle is-4">
                        <a href="{{ $WorkDetail[0] -> Url }}" target="_blank">
                            {{ $WorkDetail[0] -> Url }}
                        </a>
                    </p>
                </div>
            </div>
            <hr/>
            <div class="columns is-gapless">
                <div class="column is-4">
                    <p class="subtitle is-4">Presented</p>
                </div> 
                <div class="column">
                    @foreach($WorkDetail[0] -> WorksStaff as $value)
                    @if($value -> StaffName !== "")
                    <article class="media">
                        <div class="media-left">
                            <div class="image is-32x32">
                                <figure class="image is-1by1">
                                    <img class="is-rounded" src="{{$value -> StaffImage}}">
                                </figure>
                            </div>
                        </div>
                        <div class="media-content">
                            <a class="subtitle is-4" target="_blank" href="{{ $value -> StaffUrl }}">{{ $value -> StaffName }}({{ $value -> StaffTitle }})</a>
                        </div>
                    </article>
                    @endif
                    @endforeach
                </div>
            </div>
            <hr/>
        </div>
    </div>
</div>

<div class="container">
    <section data-scroll data-scroll-speed="2" class="hero is-small p-0 mb-6 mt-1 ml-0 mr-0" style="overflow: hidden;">
        <img class="ContentCoverImage" src="{{ $WorkDetail[0]->CoverImage }}" data-scroll data-scroll-speed="-3">
    </section>
</div>

<div class="container">
    <div class="content">
        {!! $WorkDetail[0] -> Intro !!}
    </div>
</div>

<div class="container">
    <div class="container has-text-centered mt-6 mb-6" data-scroll data-scroll-speed="2">
        <button class="button is-fullwidth is-large is-link p-6" style="min-height: 100px; border-radius: 15px;" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}contact')">
            <p class="title is-6 p-6 m-6 has-text-light">
                Contact Us
                <i class="fas fa-arrow-right ml-2"></i>
            </p>
        </button>
    </div>
</div>

<script>
var typed = new Typed("#titleText", {
    strings:["{{$WorkDetail[0]->WorksName}}",],
    stringsElement: '#typed-strings',
    typeSpeed: 20,
    startDelay: 2000,
    loop: false,
});
</script>
@endsection
