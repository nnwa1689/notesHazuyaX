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
    @foreach($userData as $User)
    <div class="box is-post" style="align-items: center;" onclick="window.location.href = '{{$webData['webConfig'][13]->tittle}}person/{{$User->username}}';">
        <div class="columns">
            <div class="column is-one-third">
                <div style="margin:0 auto 0 auto; width:200px; height:200px;">
                    <figure class="image is-1by1">
                        <img class="is-rounded" src="{{$User->Avatar}}">
                    </figure>
                </div>
            </div>
            <div class="column" style="padding: 30px; align-items: center; justify-content: flex-start; display:grid;">
                <p class="title is-size-4 has-text-centered-mobile">{{$User->Yourname}}</p>
                <p class="subtitle limit4rows">{{ $User->Signature }}</p>
            </div>
        </div>
    </div>
    @endforeach
    @endsection
