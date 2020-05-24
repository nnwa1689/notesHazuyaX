@extends('admin.adminLayout')
@section('title', '網站資訊 -  ')
@section('content')
    @parent
    <div class="box">
    <div class="field">
    <form method="post" action="/admin/updateWebInfo">
    <label class="label">網站名稱</label>
  <div class="control">
    <input name="webName" class="input" type="text" value="{{$data[0]->tittle}}">
  </div>
  <br>
  <label class="label">網站網址</label>
  <div class="control">
    <input name="URL" class="input" type="text" value="{{$data[13]->tittle}}">
  </div>
  <br>
  <label class="label">LOGO</label>
  <div class="control">
    <input name="Logo" class="input" type="text" value="{{$data[5]->tittle}}">
  </div>
  <br>
  <label class="label">KeyWords</label>
  <div class="control">
    <input name="keyWords" class="input"" type="text" value="{{$data[1]->tittle}}">
  </div>
  <br>
  <label class="label">網站描述</label>
  <div class="control">
    <textarea name="descripition" class="textarea" type="text">{{$data[2]->tittle}}</textarea>
  </div>
  <br>
  <label class="label">網站頂部</label>
  <div class="control">
    <textarea name="header"" class="textarea" type="text" value="">{{$data[4]->tittle}}</textarea>
  </div>
  <br>
  <label class="label">網站底部</label>
  <div class="control">
    <textarea name="footer" class="textarea" type="text" value="">{{$data[3]->tittle}}</textarea>
  </div>
  <br>
  <div class="control">
    <button class="button is-link is-outlined" type="submit">確認</button>
  </div>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
    </div>
</div>
@endsection
