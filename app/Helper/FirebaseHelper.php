<?php

namespace Helper;

class FirebaseHelper
{
    public static function PushNotification(array $device_id, array $message)
    {
        try {
            $fcmNotification = [];

            $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

            if (count($device_id) > 1) {
                $fcmNotification['registration_ids'] = array_values($device_id);
            } else {
                $fcmNotification['to'] = array_values($device_id)[0];
            }

            $notification = [
                'title' => $message['title'] ?? env('APP_NAME'),
                'body' => $message['body'],
                'icon' =>  $message['icon'] ?? 'myIcon',
                'sound' =>  $message['sound'] ?? 'mySound',
                'clickaction' => $message['clickaction'] ?? 'FLUTTER_NOTIFICATION_CLICK'
            ];
            $extraNotificationData = [
                "message" => $notification,
                "page" => $message['page'] ?? 'page'
            ];

            $fcmNotification['notification'] = $notification;
            $fcmNotification['data'] = $extraNotificationData;

            $headers = [
                'Authorization: key=' . env('FIREBASE_SERVER_KEY'),
                'Content-Type: application/json'
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $fcmUrl);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
