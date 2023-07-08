<div data-scroll data-scroll-speed="{{($i == 2) || $i == 3 ? '3' : '5'}}" data-scroll-delay="1.5" class="is-WorksItem {{ ($i == 2) || $i == 3 ? 'is-works-item-min' : 'is-works-item-large' }} {{ $i % 2 == 0 ? 'ml-4' : 'mr-4' }}" onclick="barba.go('{{$url}}')">
    <div class="is-WorksItem-img">
        <img class="image" src="{{$CoverImage}}">
    </div>
    <a class="button works-image-tag is-outlined is-medium">
        <span>{{$WorksName}}</span>
    </a>
</div>
