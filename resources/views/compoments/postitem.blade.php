<div class="box is-post mb-6 mt-6" onclick="window.location.href='{{ $url }}'">
    <div class="columns">
        <div class="column is-one-quarter p-0">
            <div class="post-cover-container">
                @if(isset($CoverImage) && !empty($CoverImage))
                <img alt="{{$PostTittle}}" class="post-cover" src="{{$CoverImage}}">
                @else
                <img alt="{{$PostTittle}}" class="post-cover" src="/images/NotesHZ_ICON_2023.png">
                @endif
            </div>
        </div>
        <div class="column p-4">
            <p class="title is-4 mt-3 mb-3">{{$PostTittle}}</p>
            <p class="is-size-5 limit2rows">{{ strip_tags(Str::limit($PostContant, 200)) }}</p>
            <nav class="level mt-2">
                <div class="level-left">
                    <div class="level-item">
                        <a class="button tag is-primary is-outlined is-medium is-rounded" href="{{$CategoryUrl}}">{{$Category}}</a>
                    </div>
                    <div class="level-item">
                        <i class="fas fa-calendar-alt"></i>&nbsp;{{$PostDate}}
                    </div>
                    <div class="level-item">
                        <i class="fas fa-clock"></i>&nbsp;{{$ReadTime}}分鐘
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
</div>
