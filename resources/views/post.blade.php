@extends('layout')
@section('title', $postData[0]->PostTittle.' - ')
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li><a href="{{$webData['webConfig'][13]->tittle}}/post">所有文章</a></li>
    <li><a href="{{$webData['webConfig'][13]->tittle}}/category/{{$postData[0]->ClassId}}">{{$postData[0]->Classes}}</a></li>
    <li class="is-active"><a href="#" aria-current="page">{{$postData[0]->PostTittle}}</a></li>
@endsection
@section('content')
@parent
    <link rel="stylesheet" href="{{$webData['webConfig'][13]->tittle}}/codes/styles/prism.css">
    <script src="{{$webData['webConfig'][13]->tittle}}/codes/prism.js"></script>
    <div class="box">
        <div class="columns">
            <div class="column is-9"><h2 class="title is-4">{{$postData[0]->PostTittle}}</h2>
                @if($webData['userData'] == 0)

                @else
                    <div class="buttons">
                        <button class="button is-link is-outlined" onclick="window.location.href = '{{$webData['webConfig'][13]->tittle}}admin/editPost/{{$postData[0]->PostId}}';"><i class="far fa-edit"></i>&nbsp;編輯文章</button>
                    </div>
                @endif
            </div>
                <div class="column" style="text-align:right;"><i class="fas fa-clock"></i>{{$postData[0]->PostDate}} &nbsp;
                    <a class="tag is-link" href="{{$webData['webConfig'][13]->tittle}}category/{{$postData[0]->ClassId}}">{{$postData[0]->Classes}}</a>
                </div>
        </div>
    </div>
    <div class="box content">
        {!! $postData[0]->PostContant !!}
    </div>
    <div class="box">
        <div class="buttons has-addons is-centered">
            <button class="button is-link is-outlined is-large"><div class="fb-like" data-href="{{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div></button>
            <button class="button is-facebook is-outlined is-large" onclick="window.open('https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&u={{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}&display=popup&ref=plugin&src=share_button','', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fab fa-facebook-square"></i></button>
            <button class="button is-twitter is-outlined is-large" onclick="window.open('https://twitter.com/intent/tweet?original_referer={{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}&text={{$postData[0]->PostTittle}}&tw_p=tweetbutton&url={{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}','', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fab fa-twitter-square"></i></button>
            <button class="button is-plurk is-outlined is-large" onclick="window.open('https://www.plurk.com/?qualifier=shares&status={{$postData[0]->PostTittle}}{{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}','', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fab fa-product-hunt"></i></button>
            <button class="button is-tumblr is-outlined is-large" onclick="window.open('https://www.tumblr.com/widgets/share/tool/preview?shareSource=legacy&canonicalUrl=&url={{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}&posttype=link&title={{$postData[0]->PostTittle}}&caption=&content={{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}','', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fab fa-tumblr"></i></button>
            <button class="button is-link is-outlined is-large" onclick="window.location.href='mailto:?subject={{$postData[0]->PostTittle}}&body={{$postData[0]->PostTittle}}{{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}'"><i class="fas fa-at"></i></button>
        </div>
    </div>
    <div class="box">
        <div class="columns">
            <div class="column is-half">
            @if(isset($leftPost[0]))
            <a href='{{$leftPost[0]->PostId}}'>
                <button class="button is-link is-outlined is-medium is-fullwidth">
                    <i class="fas fa-angle-left" aria-hidden="true"></i>&nbsp;{{$leftPost[0]->PostTittle}}</button>
            </a>
            @endif
            </div>

            @if(isset($rightPost[0]))
            <div class="column is-half">
            <a href='{{$rightPost[0]->PostId}}'>
                <button class="button is-link is-outlined is-medium is-fullwidth">
                {{$rightPost[0]->PostTittle}}&nbsp;<i class="fas fa-angle-right" aria-hidden="true"></i></button>
            </a>
            </div>
            @endif
        </div>
    </div>
@if($postData[0]->Reply=="Yes")
<div class="box">
    <div id="disqus_thread"></div>
    <script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    var disqus_config = function () {
        this.page.url = '{{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}';  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = '{{$webData['webConfig'][13]->tittle}}post/{{$postData[0]->PostId}}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://noteshazuya.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</div>
@endif
<script type="application/ld+json">
{
	"@context": "http://schema.org",
	"@type": "Article",
	"name" : "{{$postData[0]->PostTittle}}",
	"author" : "{{$autorData[0]->Yourname}}",
	"datePublished" : "{{$postData[0]->PostDate}}",
	"image" : "null",
	"articleBody" : "{{ $postData[0]->PostContant }}",
	"headline": "{{$postData[0]->PostTittle}}",
	"publisher" : {
    "@type" : "Organization",
    "name" : "{{$webData['webConfig'][0]->tittle}}",
    "logo" : "{{$webData['webConfig'][13]->tittle}}{{$webData['webConfig'][5]->tittle}}"
  }
}
</script>
@endsection

@section('sidebar')
@parent
<div class="box">
    <p class="title is-5"><i class="fas fa-user-alt"></i>關於作者</p>
    <div class="columns">
        <div class="column">
            <figure class="image is-128x128" style="margin-left: auto; margin-right: auto;">
                <img class="is-rounded" src="/{{$autorData[0]->Avatar}}">
            </figure>
            <br>
            <a class="title is-5" href="/person/{{$autorData[0]->username}}">{{$autorData[0]->Yourname}}</a>
            <br><br>
            <p>
                {{$autorData[0]->Signature}}
            </p>
            <hr>
            <div class="buttons has-addons is-centered">
                <button class="button is-link is-outlined" onclick="window.location.href='mailto:{{$autorData[0]->Email}}'"><i class="far fa-envelope-open"></i></button>
                <button class="button is-link is-outlined" onclick="window.location.href='/person/{{$autorData[0]->username}}/post/p/1'"><i class="fas fa-file"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection
