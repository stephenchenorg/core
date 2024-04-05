<?php

namespace Stephenchen\Core\Traits;

use Illuminate\Support\Facades\Storage;
use Stephenchen\Core\Utilities\Utility;

trait HelperStorageTrait
{
    public function getStorageUrl(?string $path): ?array
    {
        $useFakeImage = config('stephenchen-core-config.use_fake_image') ?? true;
        if ($useFakeImage) {
            $domain = 'https://fakeimg.pl';
            return [
                'path' => '1600x1600',
                'prefix' => $domain,
                'full_path' => Utility::combineURL($domain, '1600x1600'),
            ];
        }

        if (Utility::isStringEmptyOrNull($path)) {
            return null;
        }

        $filesystem = Storage::disk('s3');
        return [
            'path' => $path,
            'prefix' => $filesystem->getConfig()['url'],
            'full_path' => Storage::disk('s3')->url($path),
        ];
    }
}
