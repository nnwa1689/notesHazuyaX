@if(isset($PersonBackground)&& !empty($PersonBackground))
<section data-scroll data-scroll-speed="1" data-scroll-delay="1" class="hero mt-3 p-6" style="background-image: url({{$PersonBackgroundUrl}}); background-size: cover;">
@else
<section data-scroll data-scroll-speed="1" data-scroll-delay="1" class="hero mt-3 p-6">
@endif
    <div class="hero-body is-author-hero mt-6">
      <div class="columns is-variable" data-scroll data-scroll-speed="2" data-scroll-delay="1.5">
        <div class="column is-2">
          <div class="image is-128x128">
              <figure class="image is-1by1">
                  <img class="is-rounded" src="{{$AuthorAvatarUrl}}">
              </figure>
          </div>
        </div>
        <div class="column">
          <p class="title is-1 has-text-left">
          {{$Author}}
          <a href="mailto:{{$Email}}"><i class="far fa-envelope-open"></i></a>
          @if(isset($Linked) && $Linked !== "")
          <a href="{{$Linked}}" target="_blank" class="ml-4"><i class="fab fa-linkedin"></i></a>
          @endif
          @if(isset($Github) && $Github !== "")
          <a href="{{$Github}}" target="_blank" class="ml-4 mr-0"><i class="fab fa-github"></i></a>
          @endif
          </p>
          <div class="block">
              <p class="has-text-left is-size-5">
                  {{$Signature}}
              </p>
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
        <span>介紹</span>
      </a>
    </li>
    <li class="{{ ($PageType == 'Post') ? 'is-active' : '' }}">
      <a href="{{$AuthorPostUrl}}">
        <span class="icon is-small"><i class="fas fa-list-alt"></i></span>
        <span>文章</span>
      </a>
    </li>
  </ul>
</div>
