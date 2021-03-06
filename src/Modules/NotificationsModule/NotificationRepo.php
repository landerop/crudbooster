<?php

namespace crocodicstudio\crudbooster\Modules\NotificationsModule;

use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Support\Facades\DB;

class NotificationRepo
{
    public static function sendNotification(array $config = [])
    {
        $userIds = ($config['cms_users_id']) ?: [auth('cbAdmin')->id()];
        $notif = [];
        foreach ($userIds as $id) {
            $notif[] = [
                'created_at' => YmdHis(),
                'cms_users_id' => $id,
                'content' => $config['content'],
                'is_read' => 0,
                'url' => $config['to'],
            ];
        }
        DB::table('cms_notifications')->insert($notif);

        return true;
    }
}