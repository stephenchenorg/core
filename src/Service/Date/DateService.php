<?php

namespace Stephenchen\Core\Service\Date;

use Exception;
use Carbon\Carbon;

final class DateService
{
    /**
     * Get unity across all applications
     *
     * @return Carbon
     * @throws Exception
     */
    public static function getCarbon(): Carbon
    {
        return ( new Carbon() )->timezone(config('app.timezone'));
    }

    /**
     * Append 23:59:59 in end of the day
     *
     * @param string $source
     *
     * @return Carbon
     */
    public static function endOfDay(string $source): Carbon
    {
        return Carbon::parse($source)->endOfDay();
    }

    /**
     * @param $expires
     *
     * @return bool
     */
    public static function isExpired($expires): bool
    {
        return ( $expires && Carbon::now()->getTimestamp() > $expires );
    }

    /**
     * @param $expires
     *
     * @return bool
     */
    public static function isNotExpired($expires): bool
    {
        return !self::isExpired($expires);
    }
}
