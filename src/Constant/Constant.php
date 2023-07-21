<?php

namespace Stephenchen\Core\Constant;

final class Constant
{
    /*
    |--------------------------------------------------------------------------
    | default form type
    |--------------------------------------------------------------------------
    */

    const CONTACT = 'contact';
    const RECRUIT = 'recruit';
    const INQUIRY = 'inquiry';

    /*
    |--------------------------------------------------------------------------
    | database relate
    |--------------------------------------------------------------------------
    */

    const DATABASE_ID = 'id';
    const DATABASE_SORT = 'sort';
    const DATABASE_CREATED_AT = 'created_at';
    const DATABASE_UPDATED_AT = 'updated_at';
    const DATABASE_DESC = 'desc';
    const DATABASE_ASC = 'asc';

    /*
    |--------------------------------------------------------------------------
    | environment
    |--------------------------------------------------------------------------
    */

    const ENVIRONMENT_LOCAL = 'local';
    const ENVIRONMENT_TESTING = 'testing';
    const ENVIRONMENT_STAGING = 'staging';
    const ENVIRONMENT_PRODUCTION = 'production';

    /*
    |--------------------------------------------------------------------------
    | HTML 5 types
    |--------------------------------------------------------------------------
    */

    const HTML_BUTTON = 'button';
    const HTML_CHECKBOX = 'checkbox';
    const HTML_COLOR = 'color';
    const HTML_DATE = 'date';
    const HTML_DATETIME = 'datetime-local';
    const HTML_EMAIL = 'email';
    const HTML_FILE = 'file';
    const HTML_HIDDEN = 'hidden';
    const HTML_IMAGE = 'image';
    const HTML_MONTH = 'month';
    const HTML_NUMBER = 'number';
    const HTML_PASSWORD = 'password';
    const HTML_RADIO = 'radio';
    const HTML_RANGE = 'range';
    const HTML_RESET = 'reset';
    const HTML_SEARCH = 'search';
    const HTML_SUBMIT = 'submit';
    const HTML_TEL = 'tel';
    const HTML_TEXT = 'text';
    const HTML_TIME = 'time';
    const HTML_URL = 'url';
    const HTML_WEEK = 'week';

    /*
    |--------------------------------------------------------------------------
    | 註冊所能支援的 key
    |--------------------------------------------------------------------------
    */

    const REGISTER_OPTIONS_FIRST_NAME = 'first_name';
    const REGISTER_OPTIONS_MIDDLE_NAME = 'middle_name';
    const REGISTER_OPTIONS_LAST_NAME = 'last_name';
    const REGISTER_OPTIONS_NICK_NAME = 'nick_name';
    const REGISTER_OPTIONS_COUNTRY = 'country';
    const REGISTER_OPTIONS_CITY = 'city';
    const REGISTER_OPTIONS_ADDRESS = 'address';
    const REGISTER_OPTIONS_POSTAL_CODE = 'postal_code';
    const REGISTER_OPTIONS_FAX = 'fax';
    const REGISTER_OPTIONS_PHONE = 'phone';
    const REGISTER_OPTIONS_TELEPHONE = 'telephone';
    const REGISTER_OPTIONS_LOCAL_PHONE = 'local_phone';
    const REGISTER_OPTIONS_BIRTHDAY = 'birthday';
    const REGISTER_OPTIONS_GENDER = 'gender';
    const REGISTER_OPTIONS_CURRENCY = 'currency';
    const REGISTER_OPTIONS_NAME = 'name';
    const REGISTER_OPTIONS_COMPANY_NAME = 'company_name';
    const REGISTER_OPTIONS_DEPARTMENT = 'department';
    const REGISTER_OPTIONS_INDUSTRY = 'industry';
    const REGISTER_OPTIONS_SERVICES = 'services';
    const REGISTER_OPTIONS_AVATAR = 'avatar';
    const REGISTER_OPTIONS_FROM = 'from';

    // Is default
    const REGISTER_OPTIONS_PASSWORD = 'password';
    const REGISTER_OPTIONS_PASSWORD_CONFIRMATION = 'password_confirmation';
    const REGISTER_OPTIONS_EMAIL = 'email';
    const REGISTER_OPTIONS_ACCOUNT = 'account';

    /*
    |--------------------------------------------------------------------------
    | Html elements
    |--------------------------------------------------------------------------
    */

    const HTML_ELEMENT_TEXTAREA = 'textarea';
    const HTML_ELEMENT_INPUT = 'input';
    const HTML_ELEMENT_SELECT = 'select';

    /*
    |--------------------------------------------------------------------------
    | Html Validations
    |--------------------------------------------------------------------------
    */

    const VALIDATION_DATE = 'date';
    const VALIDATION_DIGITS_BETWEEN = 'digits_between';
    const VALIDATION_EMAIL = 'email';
    const VALIDATION_MAX = 'max';
    const VALIDATION_MIN = 'min';
    const VALIDATION_URL = 'url';

    /**
     * Get html types
     *
     * @return array
     */
    public static function getHtmlTypes(): array
    {
        return [
            self::HTML_BUTTON,
            self::HTML_CHECKBOX,
            self::HTML_COLOR,
            self::HTML_DATE,
            self::HTML_DATETIME,
            self::HTML_EMAIL,
            self::HTML_FILE,
            self::HTML_HIDDEN,
            self::HTML_IMAGE,
            self::HTML_MONTH,
            self::HTML_NUMBER,
            self::HTML_PASSWORD,
            self::HTML_RADIO,
            self::HTML_RANGE,
            self::HTML_RESET,
            self::HTML_SEARCH,
            self::HTML_SUBMIT,
            self::HTML_TEL,
            self::HTML_TEXT,
            self::HTML_TIME,
            self::HTML_URL,
            self::HTML_WEEK,
        ];
    }

    /**
     * Get html elements
     *
     * @return array
     */
    public static function getHtmlElement(): array
    {
        return [
            self::HTML_ELEMENT_TEXTAREA,
            self::HTML_ELEMENT_INPUT,
            self::HTML_ELEMENT_SELECT,
        ];
    }

    /**
     * Get register options
     *
     * @return array
     */
    public static function getRegisterOptions(): array
    {
        return [
            self::REGISTER_OPTIONS_FIRST_NAME,
            self::REGISTER_OPTIONS_MIDDLE_NAME,
            self::REGISTER_OPTIONS_LAST_NAME,
            self::REGISTER_OPTIONS_NICK_NAME,
            self::REGISTER_OPTIONS_COUNTRY,
            self::REGISTER_OPTIONS_CITY,
            self::REGISTER_OPTIONS_ADDRESS,
            self::REGISTER_OPTIONS_POSTAL_CODE,
            self::REGISTER_OPTIONS_FAX,
            self::REGISTER_OPTIONS_PHONE,
            self::REGISTER_OPTIONS_TELEPHONE,
            self::REGISTER_OPTIONS_LOCAL_PHONE,
            self::REGISTER_OPTIONS_BIRTHDAY,
            self::REGISTER_OPTIONS_GENDER,
            self::REGISTER_OPTIONS_CURRENCY,
            self::REGISTER_OPTIONS_NAME,
            self::REGISTER_OPTIONS_COMPANY_NAME,
            self::REGISTER_OPTIONS_DEPARTMENT,
            self::REGISTER_OPTIONS_INDUSTRY,
            self::REGISTER_OPTIONS_SERVICES,
            self::REGISTER_OPTIONS_AVATAR,
            self::REGISTER_OPTIONS_FROM,
        ];
    }

    /**
     * Get html validations
     *
     * @return array
     */
    public function getValidations(): array
    {
        return [
            // @TODO:
        ];
    }
}
