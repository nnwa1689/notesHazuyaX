@extends('layout')
@section('title', $data[0]->PageName.' - ')
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li class="is-active"><a href="#" aria-current="page">{{$data[0]->PageName}}</a></li>
@endsection
@section('content')
@parent
<div data-scroll data-scroll-speed="1" class="has-text-left mb-6 mt-3">
    <p data-scroll data-scroll-speed="-1" class="title is-1">{{$data[0]->PageName}}</p>
</div>
<div class="block content">
    {!! $data[0]->PageContant !!}
</div>
<p></p>
@endsection
