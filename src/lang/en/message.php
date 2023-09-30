<?php

return [
    'only_allow'         => 'only allow alpha or numeric',
    'dash'               => 'dash',
    'underline'          => 'underline',
    'sign_at'            => 'at-sign',
    'sign_plus'          => 'plus-sign',
    'sign_dot'           => 'plus-dot',
    'alpha_at_beginnind' => 'alpha-at-beginnind',

    'success'                           => 'success',
    'fail'                              => 'fail',
    'user_not_found'                    => 'can\'t not found',
    'email_not_found'                   => 'email not found',
    'resource_not_found'                => 'not found current resource, contact admin',
    'auth_token_not_match'              => 'auth token not match',
    'permission'                        => 'permission',
    'title'                             => 'title',
    'path'                              => 'path',
    'display_name'                      => 'display name',
    'account'                           => 'account',
    'role'                              => 'role',
    'unauthorized'                      => 'unauthorized',
    'delete_self' => 'can\'t delete myself',
    'file' => 'file',
    'unprocessable_permission' => 'server can\'t understand permission',
    'primary' => 'primary',
    'password' => 'password',
    'password_reset' => 'reset password ',
    'password_reset_success' => 'Reset password success',
    'password_reset_fail' => 'Reset password fail',
    'password_reset_fail_for_new_admin' => '重置密碼失敗, 可能是過期或者是 token 不正確，請聯繫我們',
    'destroy' => 'destroy success',
    'destroy_fail' => 'destroy fail',
    'login' => 'login success',
    'login_fail' => 'account or password not correct',
    'register' => 'register success',
    'register_fail' => 'register fail',
    'store' => 'store success',
    'store_fail' => 'store fail',
    'update' => 'update success',
    'update_fail' => 'update fail',
    'resend' => 'resend email success',
    'resend_fail' => 'resend email fail, please try again',
    'copy' => 'copy success',
    'copy_fail' => 'copy fail',

    // Mailgun event
    'mailgun_event_accepted' => 'accepted',
    'mailgun_event_rejected' => 'rejected',
    'mailgun_event_delivered' => 'delivered',
    'mailgun_event_failed' => 'failed',
    'mailgun_event_opened' => 'opened',
    'mailgun_event_clicked' => 'clicked',
    'mailgun_event_unsubscribed' => 'unsubscribed',
    'mailgun_event_complained' => 'complained',
    'mailgun_event_unknow' => 'unknow',

    // Validation Password
    'password_confirmation_same' => 'password confirmation and password not the same',
    'password_confirmation_required' => 'plz enter password confirmation',

    // Validation
    'validation.array' => ':key needs array format',
    'validation.email' => 'the :key needs to be email format',
    'validation.unique' => 'the :key needs to be unique',
    'validation.required' => 'the :key is required',
    'validation.numeric' => 'the :key needs numeric format',
    'validation.mimes' => ':key supports :mimes',
    'validation.max' => ':key max size is :max',
    'validation.min' => ':key min size is :key2',
    'validation.in' => 'Not support :key with this types',
    'validation.different' => ':key1 and :key2 can\'t be the same',
    'validation.length' => 'length must between :key1 and :key2',
    'validation.lte' => ':key1 must less than or equal to :key2',
    'validation.gte' => ':key1 must greater than or equal to :key2',

    'expired_forgot_password' => 'forget password token expired, plz try again',
    'expired_registration' => 'registration token expired, plz try again',

    // Start a new business
    'm_start_a_new_business' => 'NEWOIL 3 - Is ready to start a new business',

    //Some messages are sent by the robot, remind users as below
    'm_notify' => 'Form Record Notify',
    'm_notify_user_warning' => 'Warning! The message seems to be sent by the robot, please do not click on the link',

    // Send to admin when user submit a contact form
    'm_contact_notify_admin_subject' => '聯絡表單待讀取',
    'm_contact_notify_admin_content1' => '有一封聯絡表單等待您的讀取，請於儘速回覆信件',
    'm_contact_notify_admin_annotation1' => '收到這封電子郵件是因為您以此信箱註冊建立管理帳號，若此電子郵件為誤寄，請忽略。',
    'm_contact_notify_admin_annotation2' => '此信件為系統自動發出，請勿直接回覆客戶，感謝您的配合。',

    // Send to user when user submit a contact form
    'm_contact_notify_user_subject' => 'Thank you for contact !',
    'm_contact_notify_user_content1' => 'We have received your contact form.',
    'm_contact_notify_user_content2' => 'After learning your needs, we will contact you as soon as possible, so please pay attention to your email or phone call.',
    'm_contact_notify_user_annotation１' => 'Please do not reply to this email, as we are unable to respond from this email address.',

    // While user register, those info are going to send to Admin
    'm_notify_admin_subject'             => 'TBI 全球傳動 - 會員註冊待審核',
    'm_notify_admin_content1'            => '請登入會員管理，進行審查作業。<br>請選擇，核准(尚未驗證) ，會員將進行註冊驗證。',
    'm_notify_admin_button'              => '前往審核',
    'm_notify_admin_annotation1'         => 'Please do not reply to this email, as we are unable to respond from this email address.',

    // Send to user while user done registration
    'm_notify_user_subject'              => 'TBI - Thank you for registration !',
    'm_notify_user_content1'             => 'We have received your registration application.',
    'm_notify_user_content2'             => 'After the review is passed, please note that you will receive a registration verification letter again.',
    'm_notify_user_button'               => 'Go to website',

    // Send to user for verification purpose
    'm_verify_user_welcome'              => 'TBI - Member Verification',
    'm_verify_user_greeting'             => 'Your membership has been reviewed, please click below to verify to complete the registration.',
    'm_verify_user_verify'               => 'Click here to verify',

    // Forget password
    'm_forget_password_title'            => 'TBI - Forgot Password',
    'm_forget_password_content1'         => 'Please reset password within one hour. <br>If you have not applied to reset your password, please ignore the notice!<br>Beware of phishing or unknown email asking for passwords.',
    'm_forget_password_button'           => 'Reset your password',
    'm_forget_password_annotation1'      => 'This  button is valid for 1 hour.',
    'm_forget_password_annotation2'      => 'Please do not reply to this email, as we are unable to respond from this email address.',
    'm_forget_password_annotation3'      => 'If you do not want to change your password or didn\'t request a reset, you can ignore and delete this email.',

    // Reset password
    'm_reset_password_title'             => 'TBI - Reset your password',
    'm_reset_password_content1'          => 'To reset your password, click the button below in 1 hour.',
    'm_reset_password_button'            => 'Reset your password',
    'm_reset_password_annotation1'       => 'This  button is valid for 1 hour.',
    'm_reset_password_annotation2'       => 'Please do not reply to this email, as we are unable to respond from this email address.',
    'm_reset_password_annotation3'       => 'If you do not want to change your password or didn\'t request a reset, you can ignore and delete this email.',

    // Common
    'm_annotation'                       => 'Please do not reply to this email, as we are unable to respond from this email address.',

    // TBI Company info
    'm_tbi_company_info'                 => 'Company informations',
    'm_tbi_company_name'                 => 'TBI MOTION TECHNOLOGY CO.,LTD',
    'm_tbi_company_address'              => 'No. 123, Sanduo Rd., Shulin Dist., New Taipei City 23876, Taiwan',
    'm_tbi_company_email'                => 'tbimotion@tbimotion.com.tw',
    'm_tbi_company_telephone'            => '+886-2-2689-2689',
];
