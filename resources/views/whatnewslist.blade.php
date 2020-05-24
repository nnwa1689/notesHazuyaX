@extends('layout')
@section('title', '公告 - ')
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li class="is-active"><a href="{{$webData['webConfig'][13]->tittle}}whatsnews">公告</a></li>
@endsection
@section('content')
@parent
    <div class="box" style="width: 1000px;">
    @foreach($data as $hp)
    <p><a href="{{$webData['webConfig'][13]->tittle}}whatsnews/{{$hp->PostId}}">{{$hp->PostDate}} &nbsp {{$hp->PostTittle}}</a></p>
    <hr>
    @endforeach
    </div>
@endsection
@section('sideBar')
    @parent
@endsection
