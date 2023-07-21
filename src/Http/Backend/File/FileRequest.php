<?php

namespace Stephenchen\Core\Http\Backend\File;

use Stephenchen\Core\Base\BaseRequest;

final class FileRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file' => 'required|mimes:jpeg,png,jpg,pdf,ico|max:2048',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        $file = ['key' => trans('core::message.file')];

        $mimes = [
            'key'   => trans('core::message.file'),
            'mimes' => 'jpeg, png, jpg, pdf, ico',
        ];

        $max = [
            'key' => trans('core::message.file'),
            'max' => '2m',
        ];

        return [
            'file.required' => trans('core::message.validation.required', $file),
            'file.mimes'    => trans('core::message.validation.mimes', $mimes),
            'file.max'      => trans('core::message.validation.max', $max),
        ];
    }
}
