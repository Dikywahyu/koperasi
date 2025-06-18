<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginLog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginLogController extends Controller
{
    //
    public function getLog()
    {
        $logs = LoginLog::join('users', 'login_logs.user_id', '=', 'users.id')
            ->select(
                'login_logs.ket',
                'login_logs.ip_address',
                'login_logs.user_id',
                'users.email',
                'login_logs.created_at'
            )
            ->get();

        return response()->json($logs);
    }
}
