<div class="box is-post" onclick="window.location.href='{{ $url }}'">
    <div class="columns">
        <div class="column is-one-quarter" style="font-size: 150px; color: #DEF1FF; text-align: center;";>
        @if(isset($CoverImage) && !empty($CoverImage))
            <img class="post-cover" src="{{$CoverImage}}">
        @else
            <i class="far fa-image"></i>
        @endif
        </div>
        <div class="column">
            <p class="title is-4">{{$PostTittle}}</p>
            <p class="subtitle limit3rows" style="margin-bottom: 0.75rem">{{ strip_tags(\Illuminate\Support\Str::limit($PostContant, 400, $end='......')) }}</p>
            <nav class="level">
                <div class="level-left">
                    <div class="level-item">
                        <a class="tag is-link" href="{{$CategoryUrl}}">{{$Category}}</a>
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
                            <figure class="image is-48x48" style="margin-right: 0.75rem;">
                                <img class="is-rounded" src="{{$AuthorAvatarUrl}}">
                            </figure>
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
