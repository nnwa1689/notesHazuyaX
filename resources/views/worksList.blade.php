@extends('layout')
@section('title', $title)
@section('content')
<div class="container">
    <div data-scroll data-scroll-speed="-1" data-scroll-delay="0" class="mb-3 mt-3">
        <p class="title is-1 has-text-left"><span id="titleText"></span></p>
    </div>

    <div class="columns is-multiline is-mobile is-justify-content-center" style="align-items: end;">
    @php($i = 1)
    @foreach($WorksList as $item)
        <div data-scroll data-scroll-speed="{{($i == 2) || $i == 3 ? '3' : '5'}}" data-scroll-delay="1.5" onclick="barba.go('{{$webData['webConfig'][13]->tittle}}works/{{$item -> WorksID}}')" class="is-WorksItem {{ ($i == 2) || $i == 3 ? 'is-works-item-min' : 'is-works-item-large' }}">
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
</div>
<script>
    var typed = new Typed("#titleText", {
        strings:["作品集<span class=\"has-text-link pl-2\">WORKS</span>",],
        stringsElement: '#typed-strings',
        typeSpeed: 70,
        startDelay: 2000,
        loop: false,
    });
</script>
@endsection

