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
    <div class="box is-post" onclick="window.location.href='{{$webData['webConfig'][13]->tittle}}post/{{$post->PostId}}'">
        <div class="columns">
            <div class="column is-one-quarter" style="font-size: 150px; color: #DEF1FF;";>
            @if(isset($post->CoverImage) && !empty($post->CoverImage))
                <img class="post-cover" src="{{$post->CoverImage}}">
            @else
                <i class="far fa-image"></i>
            @endif
            </div>
            <div class="column">
                <p class="title is-4">{{$post->PostTittle}}</p>
                <p class="subtitle limit3rows">{{ strip_tags(\Illuminate\Support\Str::limit($post->PostContant, 400, $end='......')) }}</p>
                <nav class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <a class="tag is-link" href="{{$webData['webConfig'][13]->tittle}}category/{{$post->ClassId}}">{{$post->Classes}}</a>
                        </div>
                        <div class="level-item">
                            <i class="fas fa-calendar-alt"></i>&nbsp;{{$post->PostDate}}
                        </div>
                        <div class="level-item">
                            <i class="fas fa-clock"></i>&nbsp;{{$post->ReadTime}}分鐘
                        </div>
                    </div>
                    <div class="level-right">
                    </div>
                </nav>
            </div>
        </div>
    </div>
    @endforeach
    <div class="box">
        {{ $allPosts->links('vendor.pagination.default') }}
    </div>
</div>
@endsection
