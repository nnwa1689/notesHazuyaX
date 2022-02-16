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
            document.getElementById("pageForm").submit();
        }
    }
    </script>

        <div class="box">
        <button class="button is-danger is-outlined" onclick="deleteSub()">刪除所選</button>
            <form id="pageForm" method="post" action="/admin/deletePage">
        <table class="table is-striped is-fullwidth">
            <thead>
                <th><input name="all" type="checkbox" onclick="check_all(this,'pageID[]')" value=""></th>
                <th>PageID</th>
                <th>頁面名稱</th>
                <th>公開權限</th>
            </thead>
            <tbody>
                @foreach($allPage as $value)
                    <tr>
                        <td><input name="pageID[]" type="checkbox" value="{{$value->PageId}}"></td>
                        <td>{{$value->PageId}}</td>
                        <td>
                            <a href="/admin/editPage/{{$value->PageId}}">{{$value->PageName}}</a>
                        </td>
                        <td>{{$value->Competence}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection
