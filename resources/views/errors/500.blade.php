@extends('layout')
@section('title', "500,QQ - ")
@section('content')
<section class="hero is-fullheight">
  <div class="hero-body">
    <div class="container has-text-centered">
      <p class="title is-1 mt-2">
        <span id="errText" class="has-text-link has-text-shadow"></span>
      </p>
  </div>
</div>
</section>
<script id="mainScript">
  var typed = new Typed("#errText", {
      strings:["500", "水管工正在維修0.0"],
      stringsElement: '#typed-strings',
      typeSpeed: 30,
      startDelay: 1000,
      backSpeed: 70,
      backDelay: 2000,
      loop: true,
  });
</script>
@endsection