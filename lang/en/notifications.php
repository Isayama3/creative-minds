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
    'new_message'           => 'New Message',
	'new_employee'          => 'New User Added',
    'new_employee_add'      => 'New User Added',
    'new_employee_add_from' => 'New User Added By Store :name',
    'transaction_accepted'  => 'Transaction Accepted',
    'subscription_activated_successfully'   => 'Your subscription activated in :package successfully',
    'new_employee_added_successfully'       => 'New employee added to your account successfully',
    'transfer_denied'                       => 'Transfer denied',
    'transfer_denied_message'               => 'Your request to transfer has been denied',
    'bank_transfer'                         => 'Bank transfer',
    'bank_transfer_message'                 => 'A wire transfer has been sent by ' . (auth()->user()->owner?->name ?? '') . ' Waiting to activate',
    'package_upgrade.title'                 => 'Package upgraded successfully',
    'package_upgrade.message'               => 'Your package upgraded to :package successfully',
    'package_downgrade.title'               => 'Package downgraded successfully',
    'package_downgrade.message'             => 'Your package downgraded to :package successfully',
    'new_user'                              => 'The additional user were successfully purchased',
    'subscription_upgraded_in'    => 'Your subscription was upgraded in :subscription_title successfully',
    'subscription_upgraded_by' => 'Your subscription was upgraded in :subscription_title by :name successfully',
    'subscription_activated_in'    => 'Your subscription was activated in :subscription_title successfully',
    'subscription_activated_by' => 'Your subscription was activated in :subscription_title by :name successfully',
];
