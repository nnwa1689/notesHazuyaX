@extends('layout')
@section('title', $data[0]->PageName.' - ')
@section('content')
@parent
<div class="container">
    <div data-scroll data-scroll-speed="1" class="content mb-6 mt-3">
        <p data-scroll data-scroll-speed="-1" class="title is-1 has-text-left">
            <span id="titleText"></span>
        </p>
    </div>
    <div class="block content">
        {!! $data[0]->PageContant !!}
    </div>
</div>
<script>
    var typed = new Typed("#titleText", {
        strings:["{{$data[0]->PageName}}",],
        stringsElement: '#typed-strings',
        typeSpeed: 20,
        startDelay: 1000,
        loop: false,
    });
</script>
@endsection
