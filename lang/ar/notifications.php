<?php

/*
|--------------------------------------------------------------------------
| Notications Language Lines
|--------------------------------------------------------------------------
|
| The following language lines are used during authentication for various
| messages that we need to display to the user. You are free to modify
| these language lines according to your application's requirements.
|
*/

return [
    'new_message'                           => 'رسالة جديدة',
	'new_employee'                          => 'إضافة مستخجم جديد',
    'new_employee_add'                      => 'تم إضافة مستخدم جديد',
    'new_employee_add_from'                 => 'تم إضافة مستخدم جديد عن طريق المتجر :name',
    'transaction_accepted'                  => 'قبول التحويل',
    'subscription_activated_successfully'   => 'تمت تفعيل إشتراكك فى باقة :package بنجاح',
    'new_employee_added_successfully'       => 'تمت إضافة مستخدم جديد للحساب بنجاح',
    'transfer_denied'                       =>'رفض التحويل',
    'transfer_denied_message'               =>'تم رفض التحويل المرسل من قبلكم',
    'bank_transfer'                         => 'تحويل بنكي',
    'bank_transfer_message'                 => 'تم إرسال تحويل بنكي من قبل ' . (auth()->user()->owner?->name ?? '') . ' في انتظار التفعيل',
    'package_upgrade.title'                 => 'تم ترقية باقتك بنجاح',
    'package_upgrade.message'               => 'تم ترقية اشتراكك الى :package بنجاح',
    'package_downgrade.title'               => 'تم تقليل باقتك بنجاح',
    'package_downgrade.message'             => 'تم تقليل اشتراكك الى :package بنجاح',
    'new_user'                              => 'تم شراء مستخدم إضافى بنجاح',
    'subscription_upgraded_in'    => 'تمت ترقية إشتراكك فى  :subscription_title بنجاح',
    'subscription_upgraded_by' => 'تمت ترقية إشتراكك فى  :subscription_title عن طريق :name بنجاح',
    'subscription_activated_in'    => 'تمت تفعيل إشتراكك فى  :subscription_title بنجاح',
    'subscription_activated_by' => 'تمت تفعيل إشتراكك فى  :subscription_title عن طريق :name بنجاح',    
];
