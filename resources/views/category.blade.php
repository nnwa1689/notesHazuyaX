@extends('layout')
@section('title', $title)
@section('content')
<div class="container">
    <div data-scroll data-scroll-speed="-1" data-scroll-delay="0">
        <p class="title is-1 has-text-left">
            <span id="titleText"></span>
        </p>
        <!--<p class="is-size-5">{{$allPosts[0]->Category->Short_Intro}}</p>-->
    </div>
    <div class="columns is-multiline is-mobile is-justify-content-center mt-6">
    @foreach($allPosts as $post)
        @component('compoments.postitem',
                ['url' => $webData['webConfig'][13]->tittle."blog/".$post->PostId,
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
    <div class="block pt-6">
        {{ $allPosts->links('vendor.pagination.default') }}
    </div>
</div>
<p></p>
<script>
var typed = new Typed("#titleText", {
    strings:["{{$allPosts[0]->Category->ClassName}}",],
    stringsElement: '#typed-strings',
    typeSpeed: 20,
    startDelay: 1000,
    loop: false,
});
</script>
@endsection
