<?php
namespace App\Utility;

use App\Mail\InvoiceEmailManager;
use App\Models\SmsTemplate;
use App\Models\User;
use Mail;

class SmsUtility
{
    public static function phone_number_verification($user = '')
    {
        $sms_template = SmsTemplate::where('identifier', 'phone_number_verification')->first();
        $sms_body = $sms_template->sms_body;
        $sms_body = str_replace('[[code]]', $user->verification_code, $sms_body);
        $sms_body = str_replace('[[site_name]]', env('APP_NAME'), $sms_body);
        $template_id = $sms_template->template_id;
        $variables = array('name' => env('APP_NAME'), 'otp' => $user->verification_code);
        try {
            sendSMS($user->phone, env('APP_NAME'), $sms_body, $template_id, $variables);
        } catch (\Exception $e) {

        }
    }

    public static function password_reset($user = '')
    {
        $sms_template = SmsTemplate::where('identifier', 'password_reset')->first();
        $sms_body = $sms_template->sms_body;
        $sms_body = str_replace('[[code]]', $user->verification_code, $sms_body);
        $template_id = $sms_template->template_id;
        try {
            sendSMS($user->phone, env('APP_NAME'), $sms_body, $template_id);
        } catch (\Exception $e) {

        }
    }

    public static function order_placement($phone = '', $order = '')
    {
        $sms_template = SmsTemplate::where('identifier', 'order_placement')->first();
        $sms_body = $sms_template->sms_body;
        $sms_body = str_replace('[[order_code]]', $order->code, $sms_body);
        $template_id = $sms_template->template_id;
        $variables = array('orderID' => 'OrderNo: ' . $order->code);
        try {
            sendSMS($phone, env('APP_NAME'), $sms_body, $template_id, $variables);
        } catch (\Exception $e) {

        }
    }

    public static function order_confirmed_sms($phone = '', $order)
    {
        //sends email to customer with the invoice details
        $array['view'] = 'emails.invoice';
        $array['subject'] = translate('Order has been delivered') . ' - ' . $order->code;
        $array['from'] = env('MAIL_FROM_ADDRESS');
        $array['order'] = $order;

        $sms_template = SmsTemplate::where('identifier', 'order_confirm')->where('status',1)->first();
        if($sms_template) {
            $sms_body = $sms_template->sms_body;
            $delivery_status = translate(ucfirst(str_replace('_', ' ', $order->delivery_status)));

            $sms_body = str_replace('[[delivery_status]]', $delivery_status, $sms_body);
            $sms_body = str_replace('[[order_code]]', $order->code, $sms_body);
            $template_id = $sms_template->template_id;
            $variables = array('name' => $order->user->name, 'orderId' => 'OrderNo: ' . $order->code);
            try {
                sendSMS($phone, env('APP_NAME'), $sms_body, $template_id, $variables);
                Mail::to($order->user->email)->queue(new InvoiceEmailManager($array));
            } catch (\Exception $e) {

            }
        }
    }

    public static function delivery_status_change($phone = '', $order)
    {
        //sends email to customer with the invoice details
        $array['view'] = 'emails.invoice';
        $array['subject'] = translate('Order has been delivered') . ' - ' . $order->code;
        $array['from'] = env('MAIL_FROM_ADDRESS');
        $array['order'] = $order;

        $sms_template = SmsTemplate::where('identifier', 'delivery_status_change')->where('status',1)->first();
         if($sms_template) {
             $sms_body = $sms_template->sms_body;
             $delivery_status = translate(ucfirst(str_replace('_', ' ', $order->delivery_status)));

             $sms_body = str_replace('[[delivery_status]]', $delivery_status, $sms_body);
             $sms_body = str_replace('[[order_code]]', $order->code, $sms_body);
             $template_id = $sms_template->template_id;
             $variables = array('orderId' => 'OrderNo: ' . $order->code);
             try {
                 sendSMS($phone, env('APP_NAME'), $sms_body, $template_id, $variables);
                 Mail::to($order->user->email)->queue(new InvoiceEmailManager($array));
             } catch (\Exception $e) {

             }
         }
    }

    public static function order_shipped($phone = '', $order)
    {
        //sends email to customer with the invoice details
        $array['view'] = 'emails.invoice';
        $array['subject'] = translate('Order has been shipped') . ' - ' . $order->code;
        $array['from'] = env('MAIL_FROM_ADDRESS');
        $array['order'] = $order;

        $sms_template = SmsTemplate::where('identifier', 'order_shipped')->where('status', 1)->first();
        if ($sms_template) {
            $sms_body = $sms_template->sms_body;
            $sms_body = str_replace('[[order_code]]', $order->code, $sms_body);
            $template_id = $sms_template->template_id;
            $variables = array('name' => env('APP_NAME'), 'orderId' => 'OrderNo: ' . $order->code);
            try {
                sendSMS($phone, env('APP_NAME'), $sms_body, $template_id);
                Mail::to($order->user->email)->queue(new InvoiceEmailManager($array));
            } catch (\Exception $e) {

            }
        }
    }

    public static function order_cancelled($phone = '', $order)
    {
        //sends email to customer with the invoice details
        $array['view'] = 'emails.invoice';
        $array['subject'] = translate('Order has been cancelled') . ' - ' . $order->code;
        $array['from'] = env('MAIL_FROM_ADDRESS');
        $array['order'] = $order;

        $sms_template = SmsTemplate::where('identifier', 'order_cancel')->where('status', 1)->first();
        if ($sms_template) {
            $sms_body = $sms_template->sms_body;
            $sms_body = str_replace('[[order_code]]', $order->code, $sms_body);
            $template_id = $sms_template->template_id;
            $variables = array('name' => env('APP_NAME'), 'orderId' => 'OrderNo: ' . $order->code);
            try {
                sendSMS($phone, env('APP_NAME'), $sms_body, $template_id, $variables);
                Mail::to($order->user->email)->queue(new InvoiceEmailManager($array));
            } catch (\Exception $e) {

            }
        }
    }

    public static function wallet_recharge_sms($phone = '', $wallet)
    {
        $sms_template = SmsTemplate::where('identifier', 'wallet_recharge')->where('status', 1)->first();
        if ($sms_template) {
            $sms_body = $sms_template->sms_body;
            $sms_body = str_replace('[[WalletAmount]]', $wallet->amount, $sms_body);
            $template_id = $sms_template->template_id;
            $variables = array('WalletAmount' => $wallet->amount);
            try {
                sendSMS($phone, env('APP_NAME'), $sms_body, $template_id, $variables);
            } catch (\Exception $e) {

            }
        }
    }

    public static function payment_status_change($phone = '', $order = '')
    {
        $sms_template = SmsTemplate::where('identifier', 'payment_status_change')->first();
        $sms_body = $sms_template->sms_body;
        $sms_body = str_replace('[[payment_status]]', $order->payment_status, $sms_body);
        $sms_body = str_replace('[[order_code]]', $order->code, $sms_body);
        $template_id = $sms_template->template_id;
        try {
            sendSMS($phone, env('APP_NAME'), $sms_body, $template_id);
        } catch (\Exception $e) {

        }
    }

    public static function assign_delivery_boy($phone = '', $code = '')
    {
        $sms_template = SmsTemplate::where('identifier', 'assign_delivery_boy')->first();
        $sms_body = $sms_template->sms_body;
        $sms_body = str_replace('[[order_code]]', $code, $sms_body);
        $template_id = $sms_template->template_id;
        try {
            sendSMS($phone, env('APP_NAME'), $sms_body, $template_id);
        } catch (\Exception $e) {

        }
    }


}

?>
