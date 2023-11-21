<?php

namespace Stephenchen\Core\Contract;

use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Orchestra\Testbench\Concerns\CreatesApplication;

abstract class ImageTestable extends TestCase
{
    use CreatesApplication;

    /**
     * @return string[]
     */
    protected abstract function getImageKeys(): array;

    /**
     * @return UploadedFile
     */
    protected function getFakeImage(): UploadedFile
    {
        Storage::fake('fake');

        return UploadedFile::fake()
            ->image('fake.jpg', '5', '5')
            ->size(500);
    }

    /**
     * Assign the file to each key in the data array
     *
     * @param array $data
     * @return array
     */
    protected function mappingKeys(array $data): array
    {
        $image = $this->getFakeImage();

        foreach ($this->getImageKeys() as $key) {
            $data[$key] = $image;
        }

        return $data;
    }

    /**
     * Remove file-related keys from data before asserting database
     *
     * @param array $data
     * @return array
     */
    protected function removeKeys(array $data): array
    {
        // Remove file-related keys from data before asserting database
        return array_diff_key($data, array_flip($this->getImageKeys()));
    }
}



