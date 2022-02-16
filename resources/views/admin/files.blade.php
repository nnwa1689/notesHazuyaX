@extends('admin.adminLayout')
@section('title', '檔案管理 -  ')
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
            document.getElementById("filesForm").submit();
        }
    }
    </script>

        <div class="box">
        <button class="button is-danger is-outlined" onclick="deleteSub()">刪除所選</button>
            <form id="filesForm" method="post" action="/admin/deleteFiles">
        <table class="table is-striped is-fullwidth">
            <thead>
                <th><input name="all" type="checkbox" onclick="check_all(this,'mediaid[]')" value=""></th>
                <th>檔案</th>
                <th>上傳日期</th>
                <th>檔案大小</th>

            </thead>
            <tbody>
                @foreach($data as $file)
                    <tr>
                        <td><input name="mediaid[]" type="checkbox" value="{{$file->ID}}"></td>
                        <td><img src="{{$file->URL}}"><br><a href="{{$file->URL}}">{{$file->URL}}</a></td>
                        <td>{{$file->UploadDate}}</td>
                        <td>{{$file->Cap/1000}}KB</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
    <br>
    <div class="box">
    <nav class="pagination" role="navigation" aria-label="pagination">
  <ul class="pagination-list">
        @for($i=1;$i<=$filesnum;$i++)
        @if($nowpageNumber==$i)
            <li><a class="pagination-link is-current">{{$i}}</a>
        @else
            <li><a href="/admin/files/{{$i}}" class="pagination-link">{{$i}}</a></li>
        @endif
    @endfor
  </ul>
</nav>
    </div>

@endsection
