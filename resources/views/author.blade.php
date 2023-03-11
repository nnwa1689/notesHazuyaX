@extends('layout')
@section('title', '作者介紹 - ')
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li class="is-active"><a href="#" aria-current="page">作者介紹</a></li>
@endsection
@section('content')
    <div class="container mt-1 mb-5">
        <div class="block">
            <nav class="level mb-3">
                <div class="level-left">
                    <div class="level-item">
                        <p class="title has-text-left is-3">作者介紹</p>
                    </div>
                </div>
                <div class="level-right">
                    <p class="subtitle has-text-link has-text-right has-text-centered-mobile is-3">Author</p>
                </div>
            </nav>
            <p class="subtitle has-text-left has-text-centered-mobile is-5">感到孤單的時候，總是能在這裡找到屬於自己的地方</p>
        </div>
    </div>
    <hr/>
    <div style="margin-left:-0.75rem; margin-right:-0.75rem;" class="columns is-multiline mt-0 is-justify-content-center">
        @foreach($userData as $User)
        <div data-scroll data-scroll-speed="2" data-scroll-delay="1.5" class="box is-author-item mr-5 ml-5" onclick="window.location.href='{{$webData['webConfig'][13]->tittle}}person/{{$User->username}}'">
            <div class="is-author-item-container">
                <img alt="{{$User->Yourname}}" class="post-cover-index" src="{{$User->Avatar}}">
            </div>
            <div class="m-4">
                <p class="is-size-4 has-text-weight-bold limit2rows">{{$User->Yourname}}</p>
                <hr/>
                <p class="subtitle limit6rows">{{ $User->Signature }}</p>
            </div>
        </div>
        @endforeach
    </div>
    @endsection
