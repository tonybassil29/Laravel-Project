<?php

// app/Http/Controllers/LoginActivityController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginActivityController extends Controller
{
    public function showDetails($accountId)
    {
        $users = DB::table('user_account')
                   ->join('user_login_activities', 'user_account.account_id', '=', 'user_login_activities.account_id')
                   ->where('user_account.account_id', $accountId)
                   ->select('user_account.account_id', 'user_account.nom', 'user_account.prenom','user_account.username', 'user_account.id','user_login_activities.account_name')
                   ->get();

        return view('user_details', ['users' => $users]); // Change $user to $users
    }
    public function filter(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
    
        $loginActivities = DB::table('user_login_activities')
            ->join('user_account', 'user_login_activities.account_id', '=', 'user_account.account_id')
            ->join('date', 'user_account.id', '=', 'date.user_id')
            ->whereBetween('date.login_debut', [$start_date, $end_date])
            ->select(
                'user_login_activities.account_id',
                'user_login_activities.account_name',
                'user_login_activities.login_count'
                
            )
            ->distinct() // Éliminer les doublons
            ->get();
    
        return view('show_database', ['loginActivities' => $loginActivities]);
    }
    
    public function showUsersInAccount(Request $request, $account_id)
{
    $account = DB::table('user_account')->find($account_id);
    
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');

    $users = DB::table('user_account')
        ->where('account_id', $account_id)
        ->join('user_login_activities', 'user_account.account_id', '=', 'user_login_activities.account_id')
        ->join('date', 'user_account.id', '=', 'date.user_id')
        ->whereBetween('date.login_debut', [$start_date, $end_date])
        ->select('user_account.id', 'user_account.nom', 'user_account.prenom', 'user_login_activities.account_name')
        ->distinct()
        ->get();

    return view('user_details', ['account' => $account, 'users' => $users]);
}

}