@extends('layout')
@section('title', $title)
@section('content')
<div class="container">
    <div data-scroll data-scroll-speed="-1" data-scroll-delay="0" class="mb-6 mt-3">
        <p class="title is-1 has-text-centered">
            <span id="titleText"></span>
        </p>
    </div>
    <div class="block pt-3 pb-3">
        <div class="field is-grouped is-grouped-multiline is-justify-content-center">
                <div class="tags are-medium">
                @foreach($webData['allCategory'] as $category)
                <a class="button is-outlined is-primary is-rounded tag" href="{{$webData['webConfig'][13]->tittle}}category/{{$category->ClassId}}">{{$category->ClassName}}</a>
                @endforeach
                </div>
        </div>
    </div>
    <div class="columns is-multiline is-mobile is-justify-content-center">
        @foreach($allPosts as $post)
            @component('compoments.postitem',
                ['url' => $webData['webConfig'][13]->tittle."post/".$post->PostId,
                'CoverImage' => $post->CoverImage,
                'PostTittle' => $post->PostTittle,
                'PostContant' => $post->PostContant,
                'Category' => $post->Category->ClassName,
                'CategoryUrl' => $webData['webConfig'][13]->tittle."category/".$post->ClassId,
                'PostDate' => $post->PostDate,
                'ReadTime' => $post->ReadTime,
                'Author' => $post->Author->Yourname,
                'AuthorAvatarUrl' => $webData['webConfig'][13]->tittle.$post->Author->Avatar,
                'AuthorUrl' => ''
                ])
            @endcomponent
        @endforeach
    </div>
    <div class="block">
        {{ $allPosts->links('vendor.pagination.default') }}
    </div>
</div>
<p></p>
<script>
    var typed = new Typed("#titleText", {
        strings:["雜記<span class=\"has-text-link pl-2\">BLOG</span><a class=\"ml-2\" href=\"{{$webData['webConfig'][13]->tittle}}search\"><i class=\"fas fa-search\"></i></a>",],
        stringsElement: '#typed-strings',
        typeSpeed: 70,
        startDelay: 2000,
        loop: false,
    });
</script>
@endsection
