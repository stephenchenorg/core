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

        $useFakeImage = config('stephenchen-core-config.use_fake_image') ?? true;
        if ($useFakeImage) {
            return [
                'path' => $path,
                'prefix' => 'https://fakeimg.pl',
                'full_path' => Utility::combineURL('https://fakeimg.pl', $path)
            ];
        }

        $filesystem = Storage::disk('s3');
        return [
            'path' => $path,
            'prefix' => $filesystem->getConfig()['url'],
            'full_path' => Storage::disk('s3')->url($path)
        ];
    }
}
