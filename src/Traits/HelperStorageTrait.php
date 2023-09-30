<?php

namespace Stephenchen\Core\Traits;

use Illuminate\Support\Facades\Storage;
use Stephenchen\Core\Utilities\Utility;

trait HelperStorageTrait
{
    public function getStorageUrl($path): ?array
    {
        if (Utility::isStringEmptyOrNull($path)){
            return null;
        }

        $suffix = Storage::url($path);
        $schemeAndHttpHost = request()->getSchemeAndHttpHost();
        return [
            'path' => $suffix,
            'prefix' => $schemeAndHttpHost,
            'full_path' => $schemeAndHttpHost . $suffix
        ];
    }
}
