<div data-scroll data-scroll-speed="2" data-scroll-delay="1.5" onclick="barba.go('{{ $url }}')" class="is-post-item">
    <div class="is-post-item-img">
        @if(isset($CoverImage) && !empty($CoverImage))
        <img alt="{{$PostTittle}}" class="image" src="{{$CoverImage}}">
        @else
        <img alt="{{$PostTittle}}" class="image" src="/images/NotesHZ_ICON_2023.png">
        @endif
        <a class="button post-image-tag-category is-primary is-outlined is-rounded is-small" href="{{$CategoryUrl}}">
            <span>{{$Category}}</span>
        </a>
        <br/>
        <a class="button post-image-tag is-primary is-outlined is-rounded is-medium">
            <span>{{ strip_tags(Str::limit($PostTittle, 30)) }}</span>
        </a>
    </div>
    <a class="is-size-5 mt-5">{{ strip_tags(Str::limit($PostTittle, 30)) }}</p>
</div>

