<?php

return [
    // Common
    'only_allow'         => '只允許, 大小寫英文, 數字',
    'dash'               => '橫線(-)',
    'underline'          => '下底線(_)',
    'sign_at'            => '小老鼠(@)',
    'sign_plus'          => '+號',
    'sign_dot'           => '.號',
    'alpha_at_beginnind' => '英文字母開頭',

    'success'                           => '成功',
    'fail'                              => '失敗',
    'user_not_found'                    => '使用者找不到',
    'email_not_found'                   => '信箱找不到',
    'resource_not_found'                => '此 id 的物件找不到，請聯繫開發人員',
    'auth_token_not_match'              => 'Token 找不到',
    'permission'                        => '權限群組',
    'title'                             => '標題',
    'path' => '路徑',
    'display_name' => '顯示名稱',
    'account' => '帳號',
    'role' => '角色',
    'unauthorized' => '未經授權',
    'delete_self' => '不能刪除自己',
    'file' => '檔案',
    'unprocessable_permission' => '權限有錯，無法解析',
    'primary' => '主欄位',
    'password' => '密碼',
    'password_reset' => '重置密碼',
    'password_reset_success' => '重置密碼成功',
    'password_reset_fail' => '重置密碼失敗',
    'password_reset_fail_for_new_admin' => '重置密碼失敗, 可能是過期或者是 token 不正確，請聯繫我們',
    'page' => 'page',
    'per_page' => 'per_page',
    'destroy' => '刪除成功',
    'destroy_fail' => '刪除失敗',
    'login' => '登入成功',
    'login_fail' => '帳號或者密碼錯誤',
    'register' => '註冊成功',
    'register_fail' => '註冊失敗',
    'store' => '新增成功',
    'store_fail' => '新增失敗',
    'update' => '修改成功',
    'update_fail' => '修改失敗',
    'resend' => '信件寄送成功',
    'resend_fail' => '信件寄送失敗，請重新寄送',
    'copy' => '複製成功',
    'copy_fail' => '複製失敗',
    'disable_status' => '停用',
    'enabled_status' => '啟用',
    'true' => '是',
    'false' => '否',

    // Miscellaneous
    'name' => '名稱',

    // Mailgun event
    'mailgun_event_accepted' => '已接受發信請求',
    'mailgun_event_rejected' => '發信請求遭拒',
    'mailgun_event_delivered' => '已送達',
    'mailgun_event_failed' => '寄信失敗',
    'mailgun_event_opened' => '已開啟',
    'mailgun_event_clicked' => '已點擊信內連結',
    'mailgun_event_unsubscribed' => '遭取消訂閱',
    'mailgun_event_complained' => '遭檢舉',
    'mailgun_event_unknow' => '未知',

    // Validation Password
    'password_confirmation_same' => '兩次密碼輸入不一樣',
    'password_confirmation_required' => '請輸入確認密碼',

    // Validation
    'validation.array' => ':key 必須是 array 格式',
    'validation.email' => ':key 必須是信箱格式',
    'validation.unique' => ':key 不能重複',
    'validation.required' => ':key 必填寫',
    'validation.numeric' => ':key 必須是數字的格式',
    'validation.mimes' => ':key 只支援這幾種格式 :mimes',
    'validation.max' => ':key 只支援最大是 :max',
    'validation.min' => ':key 只支援最小是 :key2',
    'validation.in' => '只支援 :key ',
    'validation.different' => ':key 跟 :key2 不能一樣',
    'validation.length' => '長度限制 :key 到 :key2',
    'validation.lte' => ':key 不能超過 :key2',
    'validation.gte' => ':key 必須超過 :key2',

    'expired_forgot_password'            => '忘記密碼超過時效，請重新認證',
    'expired_registration'               => '註冊信箱認證超過時效，請重新認證',

    // Start a new business
    'm_start_a_new_business'             => 'NEWOIL 3 - 開站通知信',

    //Some messages are sent by the robot, remind users as below
    'm_notify'                           => '聯絡我們通知',
    'm_notify_user_warning'              => '警告！該信件內容疑似由機器人觸發寄出，如有連結請勿點擊。',

    // Send to admin when user submit a contact form
    'm_contact_notify_admin_subject'     => '聯絡表單待讀取',
    'm_contact_notify_admin_content1'    => '有一封聯絡表單等待您的讀取，請於儘速回覆信件',
    'm_contact_notify_admin_annotation1' => '收到這封電子郵件是因為您以此信箱註冊建立管理帳號，若此電子郵件為誤寄，請忽略。',
    'm_contact_notify_admin_annotation2' => '此信件為系統自動發出，請勿直接回覆客戶，感謝您的配合。',

    // Send to user when user submit a contact form
    'm_contact_notify_user_subject'      => '感謝您的聯繫',
    'm_contact_notify_user_content1'     => '我們已收到您的聯絡表單了',
    'm_contact_notify_user_content2'     => '專人收到您的需求後，會盡快與您聯繫，再請您留意收件或來電',
    'm_contact_notify_user_annotation１'  => '此信件為系統自動發出，請勿直接回覆客戶，感謝您的配合。',


    // While user register, those info are going to send to Admin
    'm_notify_admin_subject'             => 'TBI 全球傳動 - 會員註冊待審核',
    'm_notify_admin_content1'            => '請登入網站後台，進入會員管理，進行審查作業。<br>修改會員狀態為『核准(尚未驗證)』，系統將發出驗證信以利會員驗證註冊信箱',
    'm_notify_admin_button'              => '前往審核',
    'm_notify_admin_annotation1'         => '收到這封電子郵件是因為您以此信箱註冊建立管理帳號，若此電子郵件為誤寄，請忽略。',

    // Send to user while user done registration
    'm_notify_user_subject'              => 'TBI 全球傳動 - 感謝您填寫註冊信',
    'm_notify_user_content1'             => '我們已收到您的註冊申請',
    'm_notify_user_content2'             => '審核通過後，系統將寄發註冊驗證信給您，再請您留意收件',
    'm_notify_user_button'               => '前往網站',
    'm_notify_user_annotation1'          => '此信件為系統自動發出，請勿直接回覆客戶，感謝您的配合。',

    // Send to user for verification purpose
    'm_verify_user_welcome'              => 'TBI全球傳動 - 會員驗證',
    'm_verify_user_greeting'             => '您的會員資格審查已完成，請點擊下方驗證，完成註冊。',
    'm_verify_user_verify'               => '按此完成驗證',
    'm_verify_user_annotation１'          => '此信件為系統自動發出，請勿直接回覆客戶，感謝您的配合。',

    // Forget password
    'm_forget_password_title'            => 'TBI全球傳動 - 會員忘記密碼',
    'm_forget_password_content1'         => '請於一小時內點擊下方按鈕重新設定密碼，若您未申請重設密碼，請勿理會此通知！<br>提醒您！小心釣魚信件或不明信件要求輸入帳密。',
    'm_forget_password_button'           => '重新設定密碼',
    'm_forget_password_annotation1'      => '此驗證按鈕將於 1 小時後失效。',
    'm_forget_password_annotation2'      => '若您沒有沒有忘記密碼或要求重新設定密碼，請忽略此信件。',
    'm_forget_password_annotation3'      => '此信件為系統自動發出，請勿直接回覆，感謝您的配合。',

    // Reset password
    'm_reset_password_title'             => 'TBI 全球傳動 - 密碼重設驗證信',
    'm_reset_password_content1'          => '我們收到了您重設密碼的請求。請點於 1 小時內點擊下方按鈕，以重新設定密碼。',
    'm_reset_password_button'            => '重新設定密碼',
    'm_reset_password_annotation1'       => '此驗證按鈕將於 1 小時後失效。',
    'm_reset_password_annotation2'       => '若您沒有沒有忘記密碼或要求重新設定密碼，請忽略此信件。',
    'm_reset_password_annotation3'       => '此信件為系統自動發出，請勿直接回覆，感謝您的配合。',

    // Common
    'm_annotation'                       => '此信件為系統自動發出，請勿直接回覆，感謝您的配合。',

    // Company info
    'm_tbi_company_info'                 => '公司資訊',
    'm_tbi_company_name'                 => '全球傳動科技股份有限公司',
    'm_tbi_company_address'              => '23876 新北市樹林區三多路123號',
    'm_tbi_company_email'                => 'tbimotion@tbimotion.com.tw',
    'm_tbi_company_telephone'            => '+886-2-2689-2689',
];
