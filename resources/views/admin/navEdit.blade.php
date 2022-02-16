@extends('admin.adminLayout')
@section('title', '文章分類管理 -  ')
@section('content')
    @parent
    <script>
    function check_all(obj, cName) {
                var checkboxs = document.getElementsByName(cName);
                for (var i = 0; i < checkboxs.length; i++) {
                    checkboxs[i].checked = obj.checked;
                }
            }
    function doNav(){
        if(confirm("確定要套用嗎？操作不可復原！")){
            document.getElementById("navForm").submit();
        }
    }
    </script>

        <div class="box">

            <form id="navForm" method="post" action="/admin/updateNav/{{$type}}">
                        <div class="select">
                                <select name="action">
                                <option value="new">新增</option>
                                <option value="update">更新</option>
                                <option value="delete">刪除</option>
                            </select>
                </div>
                <button class="button is-link is-outlined" type="button" onclick="doNav()">套用操作</button>
            <table class="table is-striped is-fullwidth">
                <thead>
                    <th><input name="all" type="checkbox" onclick="check_all(this,'navid[]')" value=""></th>
                    <th>順次</th>
                    <th>導航名稱</th>
                    <th>URL</th>
                    <th>公開權限</th>
                </thead>
                <tbody>
                    @foreach($allNav as $value)
                        <tr>
                            <td><input name="navid[]" type="checkbox" value="{{$value->IndexId}}"></td>
                            <td>  <input name="order[{{$value->IndexId}}]" class="input" type="text" value="{{$value->NavigateId}}"></td>
                            <td>  <input name="NavName[{{$value->IndexId}}]" class="input" type="text" value="{{$value->NavigateName}}"></td>
                            <td>  <input name="URL[{{$value->IndexId}}]" class="input" type="text" value="{{$value->URL}}"></td>
                            <td>
                                <div class="select">
                                    <select name="Competence[{{$value->IndexId}}]" id="Competence{{$value->IndexId}}">
                                        @if($value->Competence == "public")
                                        <option selected="selected" value="public">公開</option>
                                        <option value="private">私有</option>
                                        @else
                                        <option value="public">公開</option>
                                        <option selected="selected" value="private">私有</option>
                                        @endif
                                    </select>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td><i class="fas fa-plus-circle"></i></td>
                        <td><input name="newOrder" type="text" class="input" value=""></td>
                        <td><input name="newName" type="text" class="input" value=""></td>
                        <td><input name="newURL" type="text" class="input" value=""></td>
                        <td>
                        <div class="select">
                            <select name="newCompetence">
                                <option value="public">公開</option>
                                <option value="private">私有</option>
                            </select>
                        </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
@endsection
