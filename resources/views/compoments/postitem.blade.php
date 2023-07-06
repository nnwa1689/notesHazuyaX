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
    </div>
    <br/>
    <a class="is-size-4 has-text-weight-bold mt-5">{{ strip_tags(Str::limit($PostTittle, 30)) }}</p>
</div>

