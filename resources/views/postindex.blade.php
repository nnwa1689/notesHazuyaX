@extends('layout')
@section('title', $title)
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li class="is-active"><a href="#" aria-current="page">所有文章</a></li>
@endsection
@section('content')
<div class="container mt-1 mb-5">
    <div class="block">
        <nav class="level mb-3">
            <div class="level-left">
                <div class="level-item">
                    <p class="title has-text-left is-3">所有文章</p>
                </div>
            </div>
            <div class="level-right">
                <p class="subtitle has-text-link has-text-right has-text-centered-mobile is-3">Blog/Post</p>
            </div>
        </nav>
        <p class="subtitle has-text-left has-text-centered-mobile is-5">夜深人靜，該來記錄一下我的嘔心瀝血惹</p>
    </div>
</div>
<hr/>
<div class="box pb-6">
    <p class="title is-5"><i class="fas fa-tags mr-1"></i>找分類｜系列文章</p>
    <div class="field is-grouped is-grouped-multiline">
            <div class="tags are-medium">
            @foreach($webData['allCategory'] as $category)
            <a class="tag button is-primary is-outlined" href="{{$webData['webConfig'][13]->tittle}}category/{{$category->ClassId}}">{{$category->ClassName}}</a>
            @endforeach
            </div>
    </div>
</div>
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
