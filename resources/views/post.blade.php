@extends('layout')
@section('title', $postData[0]->PostTittle.' - ')
@section('content')
@parent
    <div data-scroll class="section has-text-centered mb-2 mt-3">
        <div class="columns is-multiline is-justify-content-center is-align-content-center">
            <p class="is-size-6 mr-3"><i class="fas fa-clock mr-1"></i>{{$postData[0]->ReadTime}}分鐘</p>
            <p class="is-size-6 mr-3"><i class="fas fa-calendar-alt mr-1"></i>{{$postData[0]->PostDate}}</p>
            <a class="tag button is-primary is-outlined is-rounded is-small" href="{{$webData['webConfig'][13]->tittle}}category/{{$postData[0]->ClassId}}">{{$postData[0]->Category->ClassName}}</a>
        </div>
        <p class="title is-4">{{$postData[0]->PostTittle}}
            @if($webData['userData'] !== 0)
                <button class="button is-link is-outlined is-small" onclick="window.location.href = '{{$webData['webConfig'][13]->tittle}}admin/editPost/{{$postData[0]->PostId}}';"><i class="far fa-edit"></i></button>
            @endif
        </p>
    </div>
    <section data-scroll data-scroll-speed="3" class="hero is-small p-0 mb-6 ml-0 mr-0" style="overflow: hidden;">
        <img class="ContentCoverImage" src="{{ $postData[0]->CoverImage }}" data-scroll data-scroll-speed="-3">
    </section>
    <div class="container is-max-desktop mb-6">
        <div class="content line-numbers">
        {!! $postData[0]->PostContant !!}
        </div>
    </div>
    <div class="container is-max-desktop mt-6 mb-6">
        <div class="columns is-variable is-5 p-0 is-align-content-center is-align-items-center" data-scroll data-scroll-speed="2" data-scroll-delay="1.5">
            <div class="column is-2">
                <div class="image is-128x128" style="margin-left:auto; margin-right:auto;">
                    <figure class="image is-1by1">
                        <img class="is-rounded" src="{{$postData[0]->Author->Avatar}}">
                    </figure>
                </div>
                <div class="block has-text-centered mt-3">
                    <a href="mailto:{{$postData[0]->Author->Email}}"><i class="far fa-envelope-open"></i></ㄇ>
                    @if(isset($postData[0]->Author->Url_Linked) && $postData[0]->Author->Url_Linked !== "")
                    <a href="{{$postData[0]->Author->Url_Linked}}" target="_blank" class="ml-4"><i class="fab fa-linkedin"></i></a>
                    @endif
                    @if(isset($postData[0]->Author->Url_GitHub) && $postData[0]->Author->Url_GitHub !== "")
                    <a href="{{$postData[0]->Author->Url_GitHub}}" target="_blank" class="ml-4 mr-0"><i class="fab fa-github"></i></a>
                    @endif
                </div>
            </div>
            <div class="column is-10">
                <div class="box">
                    <div class="block p-4">
                        <!--<a class="is-size-3" href="/person/{{$postData[0]->username}}">{{$postData[0]->Yourname}}</a>-->
                        <p class="has-text-left limit3rows">
                            {{$postData[0]->Author->Signature}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="columns is-multiline is-gapless" data-scroll data-scroll-speed="2" data-scroll-delay="1.5">
            @if(isset($rightPost[0]))
            <div class="column is-12">
                <div class="is-homeBanner">
                    <button style="min-height: 130px; border-radius: 15px;" onclick="barba.go('{{$rightPost[0]->PostId}}')" class="button is-white is-fullwidth is-multiline is-large pt-3 pb-3">
                        <p class="subtitle is-4 mb-4">
                            下一篇<i class="fas fa-angle-right ml-1" aria-hidden="true"></i>
                        </p>
                        <p class="subtitle is-4 limit1rows">
                            {{$rightPost[0]->PostTittle}}
                        </p>
                    </button>
                </div>
            </div>
            @endif
        </div>
    </div>

    @if($postData[0]->Reply=="Yes")
    <script src="https://utteranc.es/client.js"
        repo="nnwa1689/NoteshazuyaBlogComment"
        issue-term="pathname"
        theme="github-light"
        crossorigin="anonymous">
    </script>
    @endif
    <div class="container is-max-desktop" data-scroll data-scroll-speed="2" data-scroll-delay="1.5">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3826338280068687"
            crossorigin="anonymous"></script>
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-format="fluid"
            data-ad-layout-key="-gw-3+1f-3d+2z"
            data-ad-client="ca-pub-3826338280068687"
            data-ad-slot="3052782904"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Article",
            "name" : "{{$postData[0]->PostTittle}}",
            "author" : "{{$postData[0]->Author->Yourname}}",
            "datePublished" : "{{$postData[0]->PostDate}}",
            "image" : "null",
            "articleBody" : "{{ $postData[0]->PostContant }}",
            "headline": "{{$postData[0]->PostTittle}}",
            "publisher" : {
            "@type" : "Organization",
            "name" : "{{$webData['webConfig'][0]->tittle}}",
            "logo" : "{{$webData['webConfig'][13]->tittle}}{{$webData['webConfig'][5]->tittle}}"}
        }
    </script>
@endsection
