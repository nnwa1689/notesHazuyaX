@extends('layout')
@section('title', $title)
@section('content')
<div class="container">
    <div data-scroll data-scroll-speed="-1" data-scroll-delay="0" class="mb-6">
        <p class="title is-1 has-text-left"><span id="titleText"></span></p>
    </div>
    <div class="columns is-multiline is-mobile is-justify-content-center pb-6" style="align-items: end;">
    @php($i = 1)
    @foreach($WorksList as $item)
        @component('compoments.WorksItem',
            ['url' => $webData['webConfig'][13]->tittle."works/".$item -> WorksID,
            'CoverImage' => $item -> CoverImage,
            'WorksName' => $item -> WorksName,
            'i' => $i,
            ])
        @endcomponent
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
        strings:["作品集<span class=\"has-text-hollow-link is-size-4 ml-2\">Works</span>",],
        stringsElement: '#typed-strings',
        typeSpeed: 70,
        startDelay: 2000,
        loop: false,
    });
</script>
@endsection

