@extends('admin.adminLayout')
@section('title', '文章管理 -  ')
@section('content')
    @parent
    <script>
    function check_all(obj, cName) {
                var checkboxs = document.getElementsByName(cName);
                for (var i = 0; i < checkboxs.length; i++) {
                    checkboxs[i].checked = obj.checked;
                }
            }
    function deleteSub(){
        if(confirm("確定要刪除嗎？操作不可復原！")){
            document.getElementById("postForm").submit();
        }
    }
    </script>

        <div class="box">
        <button class="button is-danger is-outlined" onclick="deleteSub()">刪除所選</button>
            <form id="postForm" method="post" action="/admin/delPost">
        <table class="table is-striped is-fullwidth">
            <thead>
                <th><input name="all" type="checkbox" onclick="check_all(this,'postid[]')" value=""></th>
                <th>ID</th>
                <th>文章標題</th>
                <th>發表日期</th>
                <th>作者</th>
                <th>分類</th>
                <th>權限</th>
                <th>允許回覆</th>

            </thead>
            <tbody>
                @foreach($listData as $value)
                    <tr>
                        <td><input name="postid[]" type="checkbox" value="{{$value->PostId}}"></td>
                        <td>{{$value->PostId}}</td>
                        <td><a href="/admin/editPost/{{$value->PostId}}">{{$value->PostTittle}}</a></td>
                        <td>{{$value->PostDate}}</td>
                        <td>{{$value->Yourname}}</td>
                        <td>{{$value->ClassName}}</td>
                        <td>{{$value->Competence}}</td>
                        <td>{{$value->Reply}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
    <br>
    <div class="box">
        {{ $listData->links('vendor.pagination.default') }}
    </div>

@endsection
