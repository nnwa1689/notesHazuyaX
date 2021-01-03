<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Carbon\Carbon;

class FirebaseController extends Controller
{
    public function initFirebase(){
        //

    }

    public static function getDataBaseData()
    {

        $firebase = (new Factory)->withServiceAccount(__DIR__.'/noteshazuya-firebase-adminsdk-1mfho-a35bb268db.json')
        ->withDatabaseUri('https://noteshazuya-default-rtdb.firebaseio.com/posts')
        ->createDatabase();
        return $firebase -> getReference('posts') -> orderByKey() -> getvalue();
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
            'avatar' => UserController::getUserData(session()->get('username'))[0]->Avatar
        ]);
        return redirect('/admin#mb');
    }
}
