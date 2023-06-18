@extends('admin.adminLayout')
@section('title', '編輯分類／系列詳細資訊 -  ')
@section('content')
    @parent
    <div class="box">
        <form method="post" action="/admin/updateCategoryDetail/{{ $categoryData[0] -> ClassId }}">
            <div class="control">
            <label class="subtitle is-5">分類/系列名稱</label>
                <input class="input is-medium" type="text" name="ClassName" value="{{ $categoryData[0] -> ClassName }}">
            </div>
            <hr/>
            <div class="control">
                <label class="subtitle is-5">分類/系列簡介</label>
                <textarea class="textarea is-medium" maxlength="250" name="shortIntro" id="shortIntro" cols="139" rows="5" value="">{{ $categoryData[0] -> Short_Intro }}</textarea>
            <textarea name="longIntro" id="longIntro" cols="139" style="display: none;" rows="30" value="">Clear</textarea>
            <hr>
            </div>
            <div class="control">
                <button style="width: 100%" class="button is-link is-outlined is-large" type="submit">更新簡介／名稱</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection
