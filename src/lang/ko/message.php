<?php

return [
    'only_allow'         => 'only allow alpha or numeric',
    'dash'               => 'dash',
    'underline'          => 'underline',
    'sign_at'            => 'at-sign',
    'sign_plus'          => 'plus-sign',
    'sign_dot'           => 'plus-dot',
    'alpha_at_beginnind' => 'alpha-at-beginnind',

    'success'                        => 'success',
    'fail'                           => 'fail',
    'user_not_found'                 => 'can\'t not found',
    'email_not_found'                => 'email not found',
    'auth_token_not_match'           => 'auth token not match',
    'login_fail'                     => 'account or password not correct',
    'permission'                     => 'permission',
    'title'                          => 'title',
    'path'                           => 'path',
    'display_name'                   => 'display name',
    'account'                        => 'account',
    'role'                           => 'role',
    'unauthorized'                   => 'unauthorized',
    'delete_self'                    => 'can\'t delete myself',
    'file'                           => 'file',
    'unprocessable_permission'       => 'server can\'t understand permission',
    'primary'                        => 'primary',
    'password'                       => 'password',

    // Validation Password
    'password_confirmation_same'     => 'password confirmation and password not the same',
    'password_confirmation_required' => 'plz enter password confirmation',

    // Validation
    'validation.email'               => 'the :key needs to be email format',
    'validation.unique'              => 'the :key needs to be unique',
    'validation.required'            => 'the :key is required',
    'validation.numeric'             => 'the :key needs numeric format',
    'validation.mimes'               => ':key supports :mimes',
    'validation.max'                 => ':key max size is :max',
    'validation.in'                  => 'Not support :key with this types',
    'validation.different'           => ':key1 and :key2 can\'t be the same',
    'validation.length'              => 'length must between :key1 and :key2',

    'expired_forgot_password'       => 'forget password token expired, plz try again',
    'expired_registration'          => 'registration token expired, plz try again',

    // While user register, those info are going to send to Admin
    'm_notify_admin_subject'        => 'TBI 全球傳動 - 會員註冊待審核',
    'm_notify_admin_content1'       => '請登入會員管理，進行審查作業。\<br\>請選擇，核准(尚未驗證) ，會員將進行註冊驗證。',
    'm_notify_admin_button'         => '前往審核',
    'm_notify_admin_annotation1'    => '此信件為系統自動發出，請勿直接回覆，感謝您的配合。\<br\>收到這封電子郵件是因為您以此信箱註冊建立管理帳號，若此電子郵件為誤寄，請忽略。',

    // Send to user while user done registration
    'm_notify_user_subject'         => 'TBI - Thank you for registration !',
    'm_notify_user_content1'        => 'We have received your registration application.',
    'm_notify_user_content2'        => 'After the review is passed, please note that you will receive a registration verification letter again.',
    'm_notify_user_button'          => 'Go to website',

    // Send to user for verification purpose
    'm_verify_user_welcome'         => 'TBI - Member Verification',
    'm_verify_user_greeting'        => 'Your membership has been reviewed, please click below to verify to complete the registration.',
    'm_verify_user_verify'          => 'Click here to verify',

    // Forget password
    'm_forget_password_title'       => 'TBI - Forgot Password',
    'm_forget_password_content1'    => 'Please reset password within one hour. <br>If you have not applied to reset your password, please ignore the notice!<br>Beware of phishing or unknown email asking for passwords.',
    'm_forget_password_button'      => 'Reset your password',
    'm_forget_password_annotation1' => 'This  button is valid for 1 hour.',
    'm_forget_password_annotation2' => 'Please do not reply to this email, as we are unable to respond from this email address.',
    'm_forget_password_annotation3' => 'If you do not want to change your password or didn\'t request a reset, you can ignore and delete this email.',

    // Reset password
    'm_reset_password_title'       => 'TBI - Reset your password',
    'm_reset_password_content1'    => 'To reset your password, click the button below in 1 hour.',
    'm_reset_password_button'      => 'Reset your password',
    'm_reset_password_annotation1' => 'This  button is valid for 1 hour.',
    'm_reset_password_annotation2' => 'Please do not reply to this email, as we are unable to respond from this email address.',
    'm_reset_password_annotation3' => 'If you do not want to change your password or didn\'t request a reset, you can ignore and delete this email.',

    // Common
    'm_annotation'                  => 'Please do not reply to this email, as we are unable to respond from this email address.',

    // TBI Company info
    'm_tbi_company_info'            => 'Company informations',
    'm_tbi_company_name'            => 'TBI MOTION TECHNOLOGY CO.,LTD',
    'm_tbi_company_address'         => '23876 新北市樹林區三多路123號',
    'm_tbi_company_email'           => 'tbimotion@tbimotion.com.tw',
    'm_tbi_company_telephone'       => '+886-2-2689-2689',
];
