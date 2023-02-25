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
@component('compoments.authorHeader',
    ['PersonBackground' => $userData[0]->PersonBackground,
    'PersonBackgroundUrl' => $webData['webConfig'][13]->tittle.$userData[0]->PersonBackground,
    'Signature' => $userData[0]->Signature,
    'AuthorIntroUrl' => $webData['webConfig'][13]->tittle.'person/'.$userData[0]->username,
    'AuthorPostUrl' => $webData['webConfig'][13]->tittle.'person/'.$userData[0]->username.'/post/p/1',
    'PageType' => 'Post',
    'Author' => $userData[0]->Yourname,
    'AuthorAvatarUrl' => $webData['webConfig'][13]->tittle.$userData[0]->Avatar,
    ])
@endcomponent
<div class="container">
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
            'Author' => '',
            'AuthorAvatarUrl' => '',
            'AuthorUrl' => ''
            ])
        @endcomponent
    @endforeach
    <div class="box">
        {{ $allPosts->links('vendor.pagination.default') }}
    </div>
    <p></p>
</div>
@endsection
