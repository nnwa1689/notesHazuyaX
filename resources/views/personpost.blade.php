@extends('layout')
@section('title', $userData[0]->Yourname. ' - ')
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li><a href="{{$webData['webConfig'][13]->tittle}}authors" aria-current="page">作者介紹</a></li>
    <li class="is-active"><a href="#" aria-current="page">{{$userData[0]->Yourname}}</a></li>
@endsection
@section('content')
@parent
    @if(isset($userData[0]->PersonBackground)&& !empty($userData[0]->PersonBackground))
    <section class="hero is-link" style="background-image: url({{$webData['webConfig'][13]->tittle}}{{$userData[0]->PersonBackground}}); background-size: cover;">
    @else
    <section class="hero is-link">
    @endif
    <div class="hero-body">
        <div class="container">
        <figure class="image" style="margin-left: auto; margin-right: auto; width:256px; height:256px;">
            <img class="is-rounded" src="/{{$userData[0]->Avatar}}">
        </figure>
            <br>
        <h1 class="title has-text-centered">{{$userData[0]->Yourname}}</h1>
        <p class="subtitle has-text-left">{{$userData[0]->Signature}}</p>
        </div>
    </div>
  <div class="tabs is-centered is-boxed">
  <ul>
    <li>
      <a href="{{$webData['webConfig'][13]->tittle}}person/{{$userData[0]->username}}">
        <span class="icon is-small"><i class="fas fa-info"></i></span>
        <span>作者簡介</span>
      </a>
    </li>
    <li class="is-active">
      <a>
        <span class="icon is-small"><i class="fas fa-list-alt"></i></span>
        <span>作者文章</span>
      </a>
    </li>
  </ul>
</div>
</section>
<div class="container">
    @foreach($allPosts as $post)
    @component('compoments.postitem',
        ['url' => $webData['webConfig'][13]->tittle."post/".$post->PostId,
        'CoverImage' => $post->CoverImage,
        'PostTittle' => $post->PostTittle,
        'PostContant' => $post->PostContant,
        'Category' => $post->Classes,
        'CategoryUrl' => $webData['webConfig'][13]->tittle."category/".$post->ClassId,
        'PostDate' => $post->PostDate,
        'ReadTime' => $post->ReadTime,
        'Author' => '',
        'AuthorAvatarUrl' => '',
        'AuthorUrl' => ''
        ])
    @endcomponent
    @endforeach
    <div class="box">
        {{ $allPosts->links('vendor.pagination.default') }}
    </div>
</div>
@endsection
