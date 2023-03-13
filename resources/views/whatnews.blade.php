@extends('layout')
@section('title', $data[0]->PostTittle.' - ')
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li><a href="{{$webData['webConfig'][13]->tittle}}whatsnews">公告</a></li>
    <li class="is-active"><a href="#" aria-current="page">{{$data[0]->PostTittle}}</a></li>
@endsection
@section('content')
@parent
<div data-scroll data-scroll-speed="2" data-scroll-delay="1.5" class="section has-text-centered mb-3 mt-6">
    <p class="is-size-3">{{$data[0]->PostTittle}}</p>
    <span><i class="fas fa-clock"></i>{{$data[0]->PostDate}}</span>
</div>
<div class="box content">
    {!! $data[0]->PostContant !!}
</div>
@endsection
