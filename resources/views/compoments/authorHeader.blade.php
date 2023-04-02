@if(isset($PersonBackground)&& !empty($PersonBackground))
<section data-scroll data-scroll-speed="1" data-scroll-delay="1" class="hero mt-4" style="background-image: url({{$PersonBackgroundUrl}}); background-size: cover;">
@else
<section data-scroll data-scroll-speed="1" data-scroll-delay="1" class="hero mt-4">
@endif
    <div class="hero-body is-author-hero mt-6 mb-6">
        <div class="columns is-variable p-0 is-align-content-center is-align-items-center" data-scroll data-scroll-speed="2" data-scroll-delay="1.5">
            <div class="column is-3">
                <div class="image is-256x256" style="margin-left:auto; margin-right:auto;">
                    <figure class="image is-1by1">
                        <img class="is-rounded" src="{{$AuthorAvatarUrl}}">
                    </figure>
                </div>
                <div class="block has-text-centered mt-3">
                    <a href="mailto:{{$Email}}"><i class="far fa-envelope-open"></i></a>
                    @if(isset($Url_Linked) && $Url_Linked !== "")
                    <a href="{{$Url_Linked}}" target="_blank" class="ml-4"><i class="fab fa-linkedin"></i></a>
                    @endif
                    @if(isset($Url_GitHub) && $Url_GitHub !== "")
                    <a href="{{$Url_GitHub}}" target="_blank" class="ml-4 mr-0"><i class="fab fa-github"></i></a>
                    @endif
                </div>
            </div>
            <div class="column is-">
                <div class="box">
                    <div class="block p-4">
                        <p class="is-size-4 has-text-left">{{$Author}}</p>
                        <hr/>
                        <p class="has-text-left">
                            {{$Signature}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="tabs is-centered is-medium is-fullwidth">
  <ul>
    <li class="{{ ($PageType == 'Intro') ? 'is-active' : '' }}">
      <a href="{{$AuthorIntroUrl}}">
        <span class="icon is-small"><i class="fas fa-info"></i></span>
        <span>作者介紹</span>
      </a>
    </li>
    <li class="{{ ($PageType == 'Post') ? 'is-active' : '' }}">
      <a href="{{$AuthorPostUrl}}">
        <span class="icon is-small"><i class="fas fa-list-alt"></i></span>
        <span>作者文章</span>
      </a>
    </li>
  </ul>
</div>
