@extends('layout')
@section('title', $title)
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li><a href="{{$webData['webConfig'][13]->tittle}}/post">所有文章</a></li>
    <li class="is-active"><a href="#" aria-current="page">{{$categorydata[0]->ClassName}}</a></li>
@endsection
@section('content')
    @foreach($allPosts as $post)
    <div class="box is-post" onclick="window.location.href='{{$webData['webConfig'][13]->tittle}}post/{{$post->PostId}}'">
        <div class="columns">
            <div class="column is-one-quarter" style="font-size: 150px; color: #DEF1FF; text-align: center;";>
            @if(isset($post->CoverImage) && !empty($post->CoverImage))
                <img style="" src="{{$post->CoverImage}}">
            @else
                <i class="far fa-image"></i>
            @endif
            </div>
            <div class="column">
                <p class="title is-4">{{$post->PostTittle}}</p>
                <p class="subtitle limit3rows" style="margin-bottom: 0.75rem">{{ strip_tags(\Illuminate\Support\Str::limit($post->PostContant, 400, $end='......')) }}</p>
                <nav class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <a class="tag is-link" href="{{$webData['webConfig'][13]->tittle}}category/{{$post->ClassId}}">{{$post->Classes}}</a>
                        </div>
                        <div class="level-item">
                            <i class="fas fa-clock"></i>{{$post->PostDate}}
                        </div>
                    </div>
                    <div class="level-right">
                        <div class="level-item">
                            <a href="{{$webData['webConfig'][13]->tittle}}person/{{$post->UserID}}">
                                <figure class="image is-48x48" style="margin-right: 0.75rem;">
                                    <img class="is-rounded" src="/{{$post->Avatar}}">
                                </figure>
                            </a>
                            <a class="subtitle is-6" href="{{$webData['webConfig'][13]->tittle}}person/{{$post->UserID}}">
                                {{$post->User}}
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    @endforeach
    <div class="box">
        {{ $allPosts->links('vendor.pagination.default') }}
    </div>
    @endsection
