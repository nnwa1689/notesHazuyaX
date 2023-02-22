@extends('layout')
@section('title', $title)
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li><a href="{{$webData['webConfig'][13]->tittle}}/post">所有文章</a></li>
    <li class="is-active"><a href="#" aria-current="page">{{$allPosts[0]->ClassName}}</a></li>
@endsection
@section('content')
    <section class="hero is-link">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">{{$allPosts[0]->ClassName}}</h1>
            </div>
        </div>
    </section>
    @foreach($allPosts as $post)
        @component('compoments.postitem',
                ['url' => $webData['webConfig'][13]->tittle."post/".$post->PostId,
                'CoverImage' => $post->CoverImage,
                'PostTittle' => $post->PostTittle,
                'PostContant' => $post->PostContant,
                'Category' => $post->ClassName,
                'CategoryUrl' => $webData['webConfig'][13]->tittle."category/".$post->ClassId,
                'PostDate' => $post->PostDate,
                'ReadTime' => $post->ReadTime,
                'Author' => $post->Yourname,
                'AuthorAvatarUrl' => $webData['webConfig'][13]->tittle.$post->Avatar,
                'AuthorUrl' => $webData['webConfig'][13]->tittle."person/".$post->UserID
                ])
        @endcomponent
    @endforeach
    <div class="box">
        {{ $allPosts->links('vendor.pagination.default') }}
    </div>
    <p></p>
@endsection
