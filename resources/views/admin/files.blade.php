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
        <button class="button is-danger is-outlined is-medium mr-4" onclick="deleteSub()">刪除所選</button>
        <button class="button is-link is-outlined is-medium">
            <input id="all" name="all" type="checkbox" onclick="check_all(this,'mediaid[]')" value="">
            <label for="all">全部選取</label>
        </button>
    </div>
    <form id="filesForm" method="post" action="/admin/deleteFiles">
        <div class="columns is-multiline">
            @foreach($data as $file)
            <div class="box is-file-index">
                <a href="{{ $file->URL }}" target="_blank">
                    <div class="file-cover-index-container">
                        <img alt="" class="file-cover-index" src="{{$file->URL}}">
                    </div>
                </a>
                <div class="m-4">
                    <span class="is-size-6">
                        <input class="mr-1" name="mediaid[]" type="checkbox" value="{{$file->ID}}">
                        <i class="fas fa-calendar-alt mr-1"></i>{{$file->UploadDate}}
                        | {{$file->Cap/1000}}KB</span>
                </div>
            </div>
            @endforeach
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </div>
    </form>
    <br><br/>
    <div class="box">
        {{ $data->links('vendor.pagination.default') }}
    </div>
@endsection
