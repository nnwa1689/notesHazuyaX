@extends('admin.adminLayout')
@section('title', '作品集管理 -  ')
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
        <form id="pageForm" method="post" action="/admin/deleteWorks">
            <table class="table is-striped is-fullwidth">
                <thead>
                    <th><input name="all" type="checkbox" onclick="check_all(this,'WorksID[]')" value=""></th>
                    <th>WorksID</th>
                    <th>作品名稱</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($Works as $value)
                        <tr>
                            <td><input name="WorksID[]" type="checkbox" value="{{ $value->PID }}"></td>
                            <td>{{ $value->WorksID }}</td>
                            <td>
                                {{ $value->WorksName }}
                            </td>
                            <td><a class="button is-link is-outlined" href="works/{{ $value -> PID }}"><i class="far fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection
