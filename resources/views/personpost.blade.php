@extends('layout')
@section('title', $userData[0]->Yourname. ' - ')
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li class="is-active"><a href="#" aria-current="page">{{$userData[0]->Yourname}}的個人檔案</a></li>
@endsection
@section('content')
@parent
    <div class="box" style="width: 1000px;">
    @if(isset($userData[0]->PersonBackground))
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
    <li>
      <a href="{{$webData['webConfig'][13]->tittle}}person/{{$userData[0]->username}}">
        <span class="icon is-small"><i class="fas fa-info"></i></span>
        <span>作者簡介</span>
      </a>
    </li>
    <li class="is-active">
      <a>
        <span class="icon is-small"><i class="fas fa-list-alt"></i></span>
        <span>我的文章</span>
      </a>
    </li>
  </ul>
</div>
</section>
    </div>
    <div class="container">
@foreach($allPosts as $post)
    <div class="box" style="width: 1000px;">
        <div class="columns">
            <div class="column is-one-quarter" style="font-size: 200px; color: #DEF1FF;";>
            @if(isset($post->CoverImage))
                <img style="" src="{{$post->CoverImage}}">
            @else
                <i class="far fa-image"></i>
            @endif
            </div>
            <div class="column">

                <p class="title is-4"><a href="{{$webData['webConfig'][13]->tittle}}post/{{$post->PostId}}">{{$post->PostTittle}}</a></p>
                <p class="subtitle">{{ strip_tags(\Illuminate\Support\Str::limit($post->PostContant, 350, $end='......')) }}</p>
                <nav class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <a class="tag is-link" href="{{$webData['webConfig'][13]->tittle}}category/{{$post->ClassId}}">{{$post->Classes}}</a>
                        </div>
                        <div class="level-item">
                            <a href="{{$webData['webConfig'][13]->tittle}}person/{{$post->UserID}}"><i class="fas fa-user"></i>{{$post->User}}</a>
                        </div>
                        <div class="level-item">
                            <i class="fas fa-clock"></i>{{$post->PostDate}}
                        </div>
                    </div>
                    <div class="level-right">
                        <div class="level-item">
                            <div class="buttons">
                                <button class="button is-link is-outlined" onclick="window.location.href = '{{$webData['webConfig'][13]->tittle}}post/{{$post->PostId}}';">繼續閱讀</button>
                            </div>
                        </div>

                    </div>
                </nav>
            </div>
        </div>
    </div>
    @endforeach
    <div class="box" style="width: 1000px;">
        <nav class="pagination is-centered" role="navigation" aria-label="pagination">
            <ul class="pagination-list">
                @for($i = 1;$i <= $postNum; $i++)
                @if($nowpageNumber==$i)
                <li><a class="pagination-link is-current">{{$i}}</a></li>
                @else
                <li><a class="pagination-link" href="{{$webData['webConfig'][13]->tittle}}person/{{$userData[0]->username}}/post/p/{{$i}}">{{$i}}</a></li>
                @endif
                @endfor
            </ul>
        </nav>
    </div>
</div>
@endsection
@section('sideBar')
    @parent
@endsection
