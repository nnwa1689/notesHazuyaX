<div class="is-WorksItem {{ ($i == 2) || $i == 3 ? 'is-works-item-min' : 'is-works-item-large' }}" data-scroll data-scroll-speed="{{($i == 2) || $i == 3 ? '3' : '5'}}" data-scroll-delay="1.5" onclick="barba.go('{{$url}}')">
    <div class="is-WorksItem-img">
        <img class="image" style="max-width:1000px; max-height:1000px;" src="{{$CoverImage}}">
    </div>
    <a class="button works-image-tag is-primary is-medium">
        <span>{{$WorksName}}</span>
    </a>
</div>