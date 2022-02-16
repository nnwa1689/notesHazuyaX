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
    <div class="box">
        <div class="columns">
            <div class="column is-9"><h2 class="title is-4">{{$data[0]->PostTittle}}</h2></div>
                <div class="column" style="text-align:right;"><i class="fas fa-clock"></i>{{$data[0]->PostDate}}</div>
        </div>
    </div>
    <div class="box content">
        {!! $data[0]->PostContant !!}
    </div>
@endsection
