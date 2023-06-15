<div data-scroll data-scroll-speed="2" data-scroll-delay="1.5" onclick="barba.go('{{ $url }}')" class="is-post-item mb-3">
    @if(isset($CoverImage) && !empty($CoverImage))
    <img alt="{{$PostTittle}}" class="image" src="{{$CoverImage}}">
    @else
    <img alt="{{$PostTittle}}" class="image" src="/images/NotesHZ_ICON_2023.png">
    @endif
    <a class="button post-image-tag-category is-primary is-outlined is-rounded is-medium" href="{{$CategoryUrl}}">
        <span>{{$Category}}</span>
    </a>
    @if(strlen($Author) > 0)
    <a class="button post-image-tag-author is-primary is-outlined is-rounded is-medium">
        <span>
            <div class="image is-48x48">
                <figure class="image is-1by1">
                    <img alt="{{$Author}}" class="is-rounded" src="{{$AuthorAvatarUrl}}">
                </figure>
            </div>
        </span>
    </a>
    @endif
    <br/>
    <a class="button post-image-tag is-primary is-outlined is-rounded is-medium">
        <span>{{ strip_tags(Str::limit($PostTittle, 25)) }}</span>
    </a>
</div>
