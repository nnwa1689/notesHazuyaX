@if(isset($PersonBackground)&& !empty($PersonBackground))
<section class="hero is-link" style="background-image: url({{$PersonBackgroundUrl}}); background-size: cover;">
@else
<section class="hero is-link">
@endif
<div class="hero-body">
    <div class="container">
        <div class="columns">
            <div class="column is-two-fifths">
                <div style="margin-left: auto; margin-right: auto; width:200px; height:200px;">
                    <figure class="image is-1by1">
                        <img class="is-rounded" src="{{$AuthorAvatarUrl}}">
                    </figure>
                </div>
            </div>
            <div class="column">
                <h1 class="title has-text-centered-mobile">{{$Author}}</h1>
                <p class="subtitle has-text-left">{{$Signature}}</p>
            </div>
        </div>
    </div>
</div>
<div class="tabs is-centered is-medium is-boxed">
  <ul>
    <li class="{{ ($PageType == 'Intro') ? 'is-active' : '' }}">
      <a href="{{$AuthorIntroUrl}}">
        <span class="icon is-small"><i class="fas fa-info"></i></span>
        <span>作者簡介</span>
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
</section>
