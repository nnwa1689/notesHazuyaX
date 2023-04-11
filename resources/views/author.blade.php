@extends('layout')
@section('title', '小夥伴們 - ')
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li class="is-active"><a href="#" aria-current="page">作者介紹</a></li>
@endsection
@section('content')
<div data-scroll data-scroll-speed="-1" data-scroll-delay="0" class="mb-4 mt-3">
    <p class="title is-1 has-text-left">小夥伴<span class="has-text-link">MEMBERS</span></p>
    <p class="is-size-5 has-text-left">這裡不會感到孤單，因為總是能在這裡找到屬於自己的地方</p>
</div>
<div style="margin-left:-0.75rem; margin-right:-0.75rem;" class="columns is-multiline mt-0 is-justify-content-center">
    @foreach($userData as $User)

    <div data-scroll data-scroll-speed="3" data-scroll-delay="1.5" onclick="window.location.href='{{$webData['webConfig'][13]->tittle}}person/{{$User->username}}'" class="is-author-item">
        <img class="image" src="{{$User->Avatar}}">
        <a class="button author-image-tag is-primary is-outlined is-rounded is-medium">
            <span>{{$User->Yourname}}</span>
        </a>
    </div>
    @endforeach
</div>
@endsection
