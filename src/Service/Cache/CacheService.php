<?php

namespace Stephenchen\Core\Service\Cache;

use Illuminate\Support\Facades\Cache;
use Stephenchen\Core\Utilities\Utility;

/**
 * @TIP: Cache drive 如果是 database, file, dynamodb, 不支援 tags, cf. https://laravel.com/docs/9.x/cache#cache-tags
 */
final class CacheService
{
    /**
     * Check current driver support tags
     */
    private static function isSupportTags(): bool
    {
        $driver = config('cache.default');
        return in_array($driver, ['redis', 'memcached']);
    }

    /**
     * Is cache has value by given key and tags
     *
     * @param array $tags
     * @param string $key
     *
     * @return bool
     */
    public static function has(array $tags, string $key): bool
    {
        if (!self::isSupportTags()) {
            return Cache::has($key);
        }
        return Cache::tags($tags)->has($key);
    }

    /**
     * Get cache by key & tags
     *
     * @param array  $tags
     * @param string $key
     *
     * @return mixed
     */
    public static function get(array $tags, string $key): mixed
    {
        // Check support tags
        if (!self::isSupportTags()) {
            return Cache::get($key);
        }
        return Cache::tags($tags)->get($key);
    }

    /**
     * Set value with key
     *
     * @param array $tags
     * @param string $key
     * @param                                      $value
     * @param int|null $ttl 默認 60 分鐘
     */
    public static function put(array $tags, string $key, $value, ?int $ttl = 3600): void
    {
        // Check support tags
        if (!self::isSupportTags()) {
            Cache::put($key, $value, $ttl);
            return;
        }

        Cache::tags($tags)->put($key, $value, $ttl);
    }

    /**
     * Flush cache with tags or flush entire cache
     *
     * @param array|null|string $tags
     */
    public static function flush($tags = NULL): void
    {
        if (Utility::isArrayEmptyOrNull($tags) || is_null($tags)) {
            Cache::flush();
            return;
        }

        // Check support tag
        if (!self::isSupportTags()) {
            Cache::flush();
            return;
        }

        $tags = is_array($tags) ? $tags : [$tags];
        Cache::tags($tags)->flush();
    }
}
