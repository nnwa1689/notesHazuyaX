@extends('layout')
@section('title', $userData[0]->Yourname.' - ')
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li class="is-active"><a href="#" aria-current="page">{{$userData[0]->Yourname}}的個人檔案</a></li>
@endsection
@section('content')
@parent
    <div class="box">
    @if(isset($userData[0]->PersonBackground)&& !empty($userData[0]->PersonBackground))
    <section class="hero is-link" style="background-image: url({{$webData['webConfig'][13]->tittle}}{{$userData[0]->PersonBackground}}); background-size: cover;">
    @else
    <section class="hero is-link">
    @endif
  <div class="hero-body">
    <div class="container" style="text-align: center;">
    <figure class="image is-128x128" style="margin-left: auto; margin-right: auto;">
  <img class="is-rounded" src="/{{$userData[0]->Avatar}}">
</figure>
<br>
      <h1 class="title">{{$userData[0]->Yourname}}</h1>
      <hr>
      <a class="subtitle">{{$userData[0]->Signature}}</a>
    </div>
  </div>
  <div class="tabs is-centered is-boxed">
  <ul>
    <li class="is-active">
      <a>
        <span class="icon is-small"><i class="fas fa-info"></i></span>
        <span>作者簡介</span>
      </a>
    </li>
    <li>
      <a href="{{$webData['webConfig'][13]->tittle}}person/{{$userData[0]->username}}/post/p/1">
        <span class="icon is-small"><i class="fas fa-list-alt"></i></span>
        <span>我的文章</span>
      </a>
    </li>
  </ul>
</div>
</section>
<div class="container content">
<p>{!! $userData[0]->IntroductionSelf !!}</p>
</div>
    </div>
@endsection
