<div class="box is-post" onclick="window.location.href='{{ $url }}'">
    <div class="columns">
        <div class="column is-one-quarter" style="text-align: center;";>
        @if(isset($CoverImage) && !empty($CoverImage))
            <img class="post-cover post-cover-desktop" src="{{$CoverImage}}">
        @else
            <img class="post-cover post-cover-desktop" src="/images/NotesHZ_ICON_2023.png">
        @endif
        </div>
        <div class="column">
            <p class="is-size-4 has-text-weight-bold">{{$PostTittle}}</p>
            <p class="is-size-5 limit1rows">{{ strip_tags(Str::limit($PostContant, 100)) }}</p>
            <nav class="level mt-2">
                <div class="level-left">
                    <div class="level-item">
                        <a class="button tag is-link is-light is-medium" href="{{$CategoryUrl}}">{{$Category}}</a>
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
                                    <img class="is-rounded" src="{{$AuthorAvatarUrl}}">
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
