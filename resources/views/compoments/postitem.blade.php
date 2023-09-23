<a data-scroll onclick="barba.go('{{ $url }}')" class="is-post-item">
    <a class="button post-image-tag-category is-primary is-small" onclick="barba.go('{{ $CategoryUrl }}')">
        <span>{{$Category}}</span>
    </a>
    <div class="is-post-item-img">
        @if(isset($CoverImage) && !empty($CoverImage))
        <img alt="{{$PostTittle}}" class="image" src="{{$CoverImage}}">
        @else
        <img alt="{{$PostTittle}}" class="image" src="/images/NotesHZ_ICON_2023.png">
        @endif
    </div>
    <a class="button is-multiline post-image-tag is-primary is-outlined is-medium ">
        <span>{{ strip_tags(Str::limit($PostTittle, 50)) }}</span>
    </a>
</a>

