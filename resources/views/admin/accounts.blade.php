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
        if(confirm("確定要刪除嗎？刪除帳號會同時刪除該帳號下的文章，操作不可復原！")){
            document.getElementById("usrForm").submit();
        }
    }
    </script>

    <div class="box">
        <form id="usrForm" method="post" action="/admin/deleteAccount">
        <button class="button is-danger is-outlined" onclick="deleteSub()">刪除所選</button>
            <table class="table is-striped is-fullwidth">
                <thead>
                    <th><input name="all" type="checkbox" onclick="check_all(this,'username[]')" value=""></th>
                    <th>UserName</th>
                    <th>暱稱</th>
                    <th>Email</th>
                    <th>最後登入日期</th>
                    <th>最後登入IP</th>
                </thead>
                <tbody>
                    @foreach($allUser as $value)
                        <tr>
                            @if($value->username !== session('username'))
                                <td><input name="username[]" type="checkbox" value="{{$value->username}}"></td>
                            @else
                                <td></td>
                            @endif
                            <td>{{$value->username}}</td>
                            <td>
                                <figure class="image is-24x24">
                                    <img class="is-rounded" src="{{$value->Avatar}}">
                                </figure>
                                <a href="/admin/editAccount/{{$value->username}}">{{$value->Yourname}}</a>
                            </td>
                            <td>{{$value->Email}}</td>
                            <td>{{$value->LastDate}}</td>
                            <td>{{$value->LastIPdata}}</td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection
