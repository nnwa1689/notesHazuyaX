@extends('layout')
@section('title', "500,QQ - ")
@section('content')
<section class="hero is-halfheight">
  <div class="hero-body">
    <div class="container has-text-centered">
      <p class="title is-1">
        <span id="errText" class="has-text-link has-text-shadow"></span>
      </p>
  </div>
</div>
</section>
<script id="mainScript">
  var typed = new Typed("#errText", {
      strings:["500", "努力維修..."],
      stringsElement: '#typed-strings',
      typeSpeed: 20,
      startDelay: 1000,
      backSpeed: 90,
      backDelay: 2000,
      loop: true,
  });
</script>
@endsection