@extends('layout')
@section('title', '作者介紹 - ')
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li class="is-active"><a href="#" aria-current="page">作者介紹</a></li>
@endsection
@section('content')
    <section class="hero is-link">
    <div class="hero-body">
        <div class="container" style="text-align: center;">
        <h1 class="title">作者介紹</h1>
        </div>
    </div>
    </section>
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
