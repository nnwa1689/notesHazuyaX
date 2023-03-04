@extends('layout')
@section('title', $title)
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li class="is-active"><a href="#" aria-current="page">作品一覽</a></li>
@endsection
@section('content')
    <div class="container mt-1 mb-5">
        <div class="block">
            <nav class="level mb-3">
                <div class="level-left">
                    <div class="level-item">
                        <p class="title has-text-left is-3">作品一覽</p>
                    </div>
                </div>
                <div class="level-right">
                </div>
            </nav>
            <p class="subtitle has-text-left has-text-centered-mobile is-5">看看這些專屬我們的回憶</p>
        </div>
    </div>
    <hr/>
    <div class="columns is-multiline is-mobile has-text-centered">
    @foreach($WorksList as $item)
        <div class="is-WorksItem is-flex-direction-row">
            <a href="works/{{$item -> WorksID}}">
                <img class="image mb-4" src="{{$item -> CoverImage}}">
            </a>
            <a class="subtitle is-5" href="works/{{$item -> WorksID}}">{{$item -> WorksName}}</a>
        </div>
    @endforeach
    </div>
    <p></p>
@endsection

@section('sidebar')
@parent
@endsection

