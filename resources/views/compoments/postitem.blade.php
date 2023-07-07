<div data-scroll data-scroll-speed="2" data-scroll-delay="1.5" onclick="barba.go('{{ $url }}')" class="is-post-item">
    <a class="button post-image-tag-category is-outlined is-small" href="{{$CategoryUrl}}">
        <span>{{$Category}}</span>
    </a>
    <div class="is-post-item-img">
        @if(isset($CoverImage) && !empty($CoverImage))
        <img alt="{{$PostTittle}}" class="image" src="{{$CoverImage}}">
        @else
        <img alt="{{$PostTittle}}" class="image" src="/images/NotesHZ_ICON_2023.png">
        @endif
    </div>
    <br/>
    <a class="title is-5">
        <span>{{ strip_tags(Str::limit($PostTittle, 30)) }}</span>
    </a>
</div>

