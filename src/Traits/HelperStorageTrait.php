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

        $prefix = config('stephenchen-core-config.image_prefix');
        $useFakeImage = config('stephenchen-core-config.use_fake_image') ?? true;
        if (Utility::isStringEmptyOrNull($prefix) || $useFakeImage) {
            return [
                'path' => $path,
                'prefix' => 'https://fakeimg.pl',
                'full_path' => Utility::combineURL('https://fakeimg.pl', $path)
            ];
        }

        return [
            'path' => $path,
            'prefix' => $prefix,
            'full_path' => Utility::combineURL($prefix, $path)
        ];
    }
}
