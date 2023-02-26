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
    function doCategory(){
        if(confirm("確定要套用嗎？操作不可復原！")){
            document.getElementById("categoryForm").submit();
        }
    }
    </script>

        <div class="box">

            <form id="categoryForm" method="post" action="/admin/updateCategory">
                <div class="select">
                    <select name="action">
                        <option value="new">新增</option>
                        <option value="update">更新</option>
                        <option value="delete">刪除</option>
                        <option value="setShow">顯示分類</option>
                        <option value="setHide">隱藏分類</option>
                    </select>
                </div>
                <button type="button" class="button is-link is-outlined" onclick="doCategory()">套用操作</button>
            <table class="table is-striped is-fullwidth">
                <thead>
                    <th><input name="all" type="checkbox" onclick="check_all(this,'classid[]')" value=""></th>
                    <th>順次</th>
                    <th>分類名稱</th>
                    <th>隱藏／顯示</th>
                    <th>編輯介紹</th>
                </thead>
                <tbody>
                    <tr>
                        <td><i class="fas fa-plus-circle"></i></td>
                        <td><input name="newOrder" type="text" class="input" value=""></td>
                        <td><input name="newName" type="text" class="input" value=""></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @foreach($allCategory as $value)
                        <tr>
                            <td><input name="classid[]" type="checkbox" value="{{$value->ClassId}}"></td>
                            <td>  <input name="order[{{$value->ClassId}}]" class="input" type="text" value="{{$value->OrderID}}"></td>
                            <td>  <input name="ClassName[{{$value->ClassId}}]" class="input" type="text" value="{{$value->ClassName}}"></td>
                            <td>{{$value->SorH}}</td>
                            <td><a class="button is-link is-outlined" href="editCategoryDetail/{{ $value -> ClassId }}"><i class="far fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
@endsection
