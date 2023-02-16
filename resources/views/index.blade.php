@extends('layout')
@section('title', $title)
@section('breadcrumb')
    @parent
    <li class="is-active"><a href="#"><i class="fas fa-home"></i>首頁</a></li>
@endsection
@section('content')
    @if($webData['webConfig'][26]->tittle !== "")
    <div class="is-homeBanner">
        <a href="{{$webData['webConfig'][13]->tittle.$webData['webConfig'][25]->tittle}}"><img class="post-cover" src="{{$webData['webConfig'][13]->tittle.$webData['webConfig'][26]->tittle}}"></a>
    </div>
    @endif
    @if($webData['webConfig'][28]->tittle !== "")
    <div class="is-homeBanner">
        <a href="{{$webData['webConfig'][13]->tittle.$webData['webConfig'][27]->tittle}}"><img class="post-cover" src="{{$webData['webConfig'][13]->tittle.$webData['webConfig'][28]->tittle}}"></a>
    </div>
    @endif
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
    <div class="is-homeBanner">
        <button style="min-height: 162px;" onclick="location.href='{{$webData['webConfig'][13]->tittle}}post'" class="button is-link is-dark is-fullwidth is-large">所有文章&nbsp;<i class="fas fa-arrow-right"></i></button>
    </div>
@endsection
