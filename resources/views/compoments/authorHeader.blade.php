@if(isset($PersonBackground)&& !empty($PersonBackground))
<section data-scroll data-scroll-speed="2" data-scroll-delay="1.5" class="hero is-primary mt-6 mb-4" style="background-image: url({{$PersonBackgroundUrl}}); background-size: cover;">
@else
<section data-scroll data-scroll-speed="2" data-scroll-delay="1.5" class="hero is-primary mt-6 mb-4">
@endif
    <div class="hero-body is-author-hero">
        <div class="columns is-multiline is-gapless">
            <div class="column is-two-fifths p-0">
                <div class="is-author-cover-container">
                        <img src="{{$AuthorAvatarUrl}}">
                </div>
            </div>
            <div class="column m-6">
                <h1 class="title has-text-centered-mobile">{{$Author}}</h1>
                <p class="subtitle has-text-left">{{$Signature}}</p>
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
