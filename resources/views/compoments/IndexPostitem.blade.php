<div class="box is-post-index" onclick="window.location.href='{{ $url }}'">
        <div class="" style="text-align: center;";>
        @if(isset($CoverImage) && !empty($CoverImage))
            <img alt="{{$PostTittle}}" class="post-cover post-cover-index-desktop" src="{{$CoverImage}}">
        @else
            <img alt="{{$PostTittle}}" class="post-cover post-cover-index-desktop" src="/images/NotesHZ_ICON_2023.png">
        @endif
        </div>
        <div class="">
            <p class="is-size-4 has-text-weight-bold">{{$PostTittle}}</p>
            <p class="is-size-5 limit1rows">{{ strip_tags(Str::limit($PostContant, 100)) }}</p>
            <nav class="level mt-2">
                <div class="level-left">
                    <div class="level-item">
                        <a class="button tag is-primary is-outlined is-medium" href="{{$CategoryUrl}}">{{$Category}}</a>
                    </div>
                </div>
                @if(strlen($Author) > 0)
                <div class="level-right">
                    <div class="level-item">
                        <a href="{{$AuthorUrl}}">
                            <div class="image is-48x48" style="margin-right: 0.75rem;">
                                <figure class="image is-1by1">
                                    <img alt="{{$Author}}" class="is-rounded" src="{{$AuthorAvatarUrl}}">
                                </figure>
                            </div>
                        </a>
                        <a class="subtitle is-6" href="{{$AuthorUrl}}">
                            {{$Author}}
                        </a>
                    </div>
                </div>
                @endif
            </nav>
        </div>
</div>
