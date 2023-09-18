@extends('layout')
@section('title', $title)
@section('content')
<div class="container">
    <div data-scroll class="mb-6">
        <p class="title is-1 has-text-left"><span id="titleText"></span></p>
    </div>
    <div class="columns is-multiline is-gapless is-mobile is-justify-left" style="align-items: end;">
    @php($i = 1)
    @foreach($WorksList as $item)
        @component('compoments.WorksItem',
            ['url' => $webData['webConfig'][13]->tittle."works/".$item -> WorksID,
            'CoverImage' => $item -> CoverImage,
            'WorksName' => $item -> WorksName,
            'i' => $i,
            ])
        @endcomponent
    @endforeach
    </div>
</div>
<script>
    var typed = new Typed("#titleText", {
        strings:["作品集<span class=\"has-text-hollow-link ml-2\">Works.</span>",],
        stringsElement: '#typed-strings',
        typeSpeed: 70,
        startDelay: 2000,
        loop: false,
    });
</script>
@endsection

