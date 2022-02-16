@extends('admin.adminLayout')
@section('title', '帳號管理 -  ')
@section('content')
    @parent
    <div class="box">
    <div class="field">
    <form method="post" action="/admin/{{isset($userData[0]->username) ? 'updateAccount/'.$userData[0]->username : 'addAccount'}}">
        <label class="label">使用者名稱</label>
        <div class="control">
                @if(isset($userData[0]->username))
                    <a>{{$userData[0]->username}}</a>
                @else
                    <input name="username" class="input" type="text" value="">
                @endif
        </div>
        <br>
        <label class="label">暱稱</label>
        <div class="control">
                @if(isset($userData[0]->Yourname))
                    <a>{{$userData[0]->Yourname}}</a>
                @else
                    <input name="Yourname" class="input" type="text" value="">
                @endif
        </div>
        <br>
        <label class="label">Email</label>
        <div class="control">
                @if(isset($userData[0]->Email))
                    <a>{{$userData[0]->Email}}</a>
                @else
                    <input name="Email" class="input" type="text" value="">
                @endif
        </div>
        <br>
        <label class="label">密碼</label>
        <div class="control">
                @if(isset($userData[0]->pw))
                    <a></a>
                @else
                    <input name="pw" class="input" type="password" value="">
                @endif
        </div>
        <br>
        <label class="label">允許變更網站資訊</label>
        <div class="control">
            <div class="select">
                <select name="Law_webInfo" id="Law_webInfo">
                    <option value="1">允許</option>
                    <option value="0">不允許</option>
                </select>
                <script>
                    $('#Law_webInfo option[value={{isset($userData[0]->Law_WebInfo) ? $userData[0]->Law_WebInfo : ''}}]').attr('selected', 'selected');//自動取得目前設定值
                </script>
            </div>
        </div>
        <br>
        <label class="label">允許編輯檔案庫</label>
        <div class="control">
            <div class="select">
                <select name="Law_files" id="Law_files">
                    <option value="1">允許</option>
                    <option value="0">不允許</option>
                </select>
                <script>
                    $('#Law_files option[value={{isset($userData[0]->Law_Files) ? $userData[0]->Law_Files : ''}}]').attr('selected', 'selected');//自動取得目前設定值
                </script>
            </div>
        </div>
        <br>
        <label class="label">允許新增／編輯／刪除文章</label>
        <div class="control">
            <div class="select">
                <select name="Law_post" id="Law_post">
                    <option value="2">允許</option>
                    <option value="1">僅允許自己的文章</option>
                    <option value="0">不允許</option>
                </select>
                <script>
                    $('#Law_post option[value={{isset($userData[0]->Law_Post) ? $userData[0]->Law_Post : ''}}]').attr('selected', 'selected');//自動取得目前設定值
                </script>
            </div>
        </div>
        <br>
        <label class="label">允許編輯文章分類</label>
        <div class="control">
            <div class="select">
                <select name="Law_Category" id="Law_Category">
                    <option value="1">允許</option>
                    <option value="0">不允許</option>
                </select>
                <script>
                    $('#Law_Category option[value={{isset($userData[0]->Law_Category) ? $userData[0]->Law_Category : ''}}]').attr('selected', 'selected');//自動取得目前設定值
                </script>
            </div>
        </div>
        <br>
        <label class="label">允許新增／編輯／刪除公告</label>
        <div class="control">
            <div class="select">
                <select name="Law_News" id="Law_News">
                    <option value="1">允許</option>
                    <option value="0">不允許</option>
                </select>
                <script>
                    $('#Law_News option[value={{isset($userData[0]->Law_News) ? $userData[0]->Law_News : ''}}]').attr('selected', 'selected');//自動取得目前設定值
                </script>
            </div>
        </div>
        <br>
        <label class="label">允許變更其他使用者帳戶</label>
        <div class="control">
            <div class="select">
                <select name="Law_Account" id="Law_Account">
                    <option value="1">允許</option>
                    <option value="0">不允許</option>
                </select>
                <script>
                    $('#Law_Account option[value={{isset($userData[0]->Law_Users) ? $userData[0]->Law_Users : ''}}]').attr('selected', 'selected');//自動取得目前設定值
                </script>
            </div>
        </div>
        <br>
        <label class="label">允許新增／編輯／刪除網站頁面</label>
        <div class="control">
            <div class="select">
                <select name="Law_Page" id="Law_Page">
                    <option value="1">允許</option>
                    <option value="0">不允許</option>
                </select>
                <script>
                    $('#Law_Page option[value={{isset($userData[0]->Law_Page) ? $userData[0]->Law_Page : ''}}]').attr('selected', 'selected');//自動取得目前設定值
                </script>
            </div>
        </div>
        <br>
        <label class="label">允許新增／編輯／刪除導航欄</label>
        <div class="control">
            <div class="select">
                <select name="Law_Nav" id="Law_Nav">
                    <option value="1">允許</option>
                    <option value="0">不允許</option>
                </select>
                <script>
                    $('#Law_Nav option[value={{isset($userData[0]->Law_Nav) ? $userData[0]->Law_Nav : ''}}]').attr('selected', 'selected');//自動取得目前設定值
                </script>
            </div>
        </div>
        <br>
  <br>
  <div class="control">
    <button style="width: 100%" class="button is-link is-outlined" type="submit">確認</button>
  </div>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
    </div>
</div>
@endsection
