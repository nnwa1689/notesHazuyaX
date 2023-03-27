@extends('layout')
@section('title', $title)
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li class="is-active"><a href="#" aria-current="page">所有文章</a></li>
@endsection
@section('content')
<div data-scroll data-scroll-speed="2" data-scroll-delay="1.5" class="section has-text-centered mb-3 mt-6">
    <p class="is-size-3">所有文章<span class="has-text-link pl-2">Blog/Post</span></p>
    <p class="is-size-5">這裡，紀錄與收藏著小夥伴們的各種經驗與過程！</p>
</div>
<div class="block pb-6">
    <p class="title is-5"><i class="fas fa-tags mr-1"></i>找分類｜系列文章</p>
    <div class="field is-grouped is-grouped-multiline">
            <div class="tags are-medium">
            @foreach($webData['allCategory'] as $category)
            <a class="button is-outlined is-primary is-rounded tag" href="{{$webData['webConfig'][13]->tittle}}category/{{$category->ClassId}}">{{$category->ClassName}}</a>
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
