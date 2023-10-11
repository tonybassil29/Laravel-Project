<?php

// app/Http/Controllers/LoginLogsController.php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Date;
use App\Models\UserAccount;

class LoginLogsController extends Controller
{
    public function index($id_user)
    {
      
        $logins = DB::table('date')
            ->join('user_account', 'date.user_id', '=', 'user_account.id')
            ->where('date.user_id', $id_user)
            ->select('user_account.username', 'date.login_debut', 'date.login_fin', 'date.user_id')
            ->get();
    
        return view('login_logs', ['logins' => $logins]);
    }
    
}
