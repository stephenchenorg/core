<?php

namespace Stephenchen\Core\Traits;

use Illuminate\Support\Facades\Storage;
use Stephenchen\Core\Utilities\Utility;

trait HelperStorageTrait
{
    public function getStorageUrl(?string $path): ?array
    {
        if (Utility::isStringEmptyOrNull($path)) {
            return null;
        }

        $useFake = config('stephenchen-core-config.use_fake_image') ?? false;
        $schemeAndHttpHost = $useFake ? 'https://fakeimg.pl' : request()->getSchemeAndHttpHost();
        $suffix = $useFake ? $path : Storage::url($path);

        return [
            'path' => $suffix,
            'prefix' => $schemeAndHttpHost,
            'full_path' => Utility::combineURL($schemeAndHttpHost, $suffix)
        ];
    }
}
