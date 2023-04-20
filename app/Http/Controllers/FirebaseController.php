<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Carbon\Carbon;
use App\Services\UserService;

class FirebaseController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService) 
    {
        $this -> userService = $userService;
    }

    public function initFirebase(){
        //

    }

    public static function getDataBaseData()
    {

        $firebase = (new Factory)->withServiceAccount(__DIR__.'/noteshazuya-firebase-adminsdk-1mfho-a35bb268db.json')
        ->withDatabaseUri('https://noteshazuya-default-rtdb.firebaseio.com/posts')
        ->createDatabase();
        return $firebase -> getReference('posts') -> orderByChild('datemark') -> getvalue();
    }

    public static function newData()
    {
        $firebase = (new Factory)->withServiceAccount(__DIR__.'/noteshazuya-firebase-adminsdk-1mfho-a35bb268db.json')
        ->withDatabaseUri('https://noteshazuya-default-rtdb.firebaseio.com/posts')
        ->createDatabase();

        $firebase -> getReference('posts') -> push([
            'userID' => session()->get('username'),
            'date'=> Carbon::now()->setTimezone("Asia/Taipei")->toDateTimeString(),
            'content' => $_POST['content'],
            'avatar' => $this -> userService -> GetUserData(session()->get('username'))[0]->Avatar,
            'datemark'=> Carbon::now()->timestamp
        ]);
        return redirect('/admin#mb');
    }
}
