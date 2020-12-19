@extends('layout')
@section('title', $data[0]->PageName.' - ')
@section('breadcrumb')
    @parent
    <li><a href="{{$webData['webConfig'][13]->tittle}}"><i class="fas fa-home"></i>首頁</a></li>
    <li class="is-active"><a href="#" aria-current="page">{{$data[0]->PageName}}</a></li>
@endsection
@section('content')
@parent
    <div class="box content">
    <section class="hero is-link">
  <div class="hero-body">
    <div class="container" style="text-align: center;">
      <h1 class="title">{{$data[0]->PageName}}</h1>
    </div>
  </div>
</section>
    <p>
        {!! $data[0]->PageContant !!}
    </p>
    </div>
@endsection
