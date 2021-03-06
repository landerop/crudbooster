<?php

namespace crocodicstudio\crudbooster\Modules\LogsModule;

use Illuminate\Support\Facades\Log;

class LogsRepository
{
    public static function insertLog($description, $uid)
    {
        $log = [
            'created_at' => YmdHis(),
            'ipaddress' => request()->server('REMOTE_ADDR'),
            'useragent' => request()->server('HTTP_USER_AGENT'),
            'url' => request()->url(),
            'cms_users_id' => $uid,
            'description' => $description
        ];
        Log::info($description, $log);
        \DB::table('cms_logs')->insert($log);
    }
}