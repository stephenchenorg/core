<?php

namespace Stephenchen\Core\Utilities;

use Exception;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Stephenchen\Core\Constant\Constant;

final class Utility
{
    /**
     * Check float is between given min and max range
     *
     * Ref. https://stackoverflow.com/questions/4684023/how-to-check-if-an-integer-is-within-a-range-of-numbers-in-php
     *
     * @param float $target
     * @param float $min
     * @param float $max
     *
     * @return mixed
     */
    static function isFloatBetween(float $target, float $min, float $max)
    {
        return filter_var($target,
            FILTER_VALIDATE_FLOAT, [
                'options' => [
                    'min_range' => $min,
                    'max_range' => $max,
                ],
            ]
        );
    }

    /**
     * Get url query parameters
     *
     * @param $url
     *
     * @return array
     */
    static function retrieveURLQuery($url): array
    {
        $queries = parse_url($url, PHP_URL_QUERY);
        parse_str($queries, $values);
        return $values;
    }

    /**
     * Determine if the $source not equal empty or null validation
     *
     * @param $source
     *
     * @return bool
     */
    static function isStringNotEmptyOrNull($source): bool
    {
        return !self::isStringEmptyOrNull($source);
    }

    /**
     * Determine if the $source equal to empty or null validation
     *
     * @param $source
     *
     * @return bool
     */
    static function isStringEmptyOrNull($source): bool
    {
        return (!isset($source) || trim($source) === '');
    }

    /**
     * Encoding json
     *
     * @param      $source
     * @param bool $associative
     *
     * @return array|null
     */
    static function jsonDecode($source, bool $associative = TRUE): ?array
    {
        return json_decode($source, $associative);
    }

    /**
     * Convert array or object to plain string
     *
     * @param mixed $source
     * @param int|null $options json encode $options
     *
     * @return string
     */
    static function toString($source, int $options = NULL): string
    {
        return (is_array($source) || is_object($source))
            ? self::jsonEncode($source, $options)
            : (string)$source;
    }

    /**
     * Encoding json
     *
     * @param     $source
     * @param int|null $options
     *
     * @return string
     */
    static function jsonEncode($source, int $options = NULL): string
    {
        return json_encode($source, $options ?? JSON_UNESCAPED_UNICODE);
    }

    /**
     * Combine host and path without worry about slash
     *
     * @param $host
     * @param $path
     *
     * @return string
     */
    static function combineURL($host, $path): string
    {
        // https://stackoverflow.com/questions/5055903/add-trailing-slash-to-url
        $prefix = rtrim($host, '/') . '/';
        $path   = ltrim($path, '/');

        return "$prefix$path";
    }

    /**
     * Combine url with given query string array
     *
     * @param string $url
     * @param array $array
     *
     * @return string
     */
    static function combineQuerySting(string $url, array $array): string
    {
        $aURL = Request::create($url);
        return $aURL->fullUrlWithQuery($array);
    }

    /**
     * Combine host and path without worry about slash
     *
     * @param $source
     *
     * @return bool
     */
    static function isArrayEmptyOrNull($source): bool
    {
        return empty($source);
    }

    /**
     * Check array has key
     *
     * @param array|null $source
     * @param string $key
     *
     * @return bool
     */
    static function isArrayHasKey(?array $source, string $key): bool
    {
        if (is_null($source)) {
            return FALSE;
        }

        return isset($source) && array_key_exists($key, $source);
    }

    /**
     * Update value in current env file
     *
     * @param $key
     * @param $value
     */
    static function updatePermanentEnvValue($key, $value)
    {
        // If null or empty, set to empty string
        $value = $value ?? '';

        $path = app()->environmentFilePath();

        $escaped = preg_quote('=' . env($key), '/');

        file_put_contents($path, preg_replace(
            "/^$key$escaped/m",
            "$key=\"$value\"",
            file_get_contents($path)
        ));
    }

    /**
     * Dump and die error log while app env is not production
     *
     * @param string $title
     * @param Exception $exception
     *
     * @return void
     */
    static function maybeDD(string $title, Exception $exception)
    {
        $environments = [
            Constant::ENVIRONMENT_PRODUCTION,
            Constant::ENVIRONMENT_STAGING,
        ];

        if (!App::environment($environments) && !\app()->runningInConsole() && !\app()->runningUnitTests()) {
            dd($title, $exception->getMessage(), $exception->getTraceAsString());
        }

        Log::error($title, $exception);
    }

    /**
     * Generate token
     *
     * @return string
     */
    static function generateUniqidToken(): string
    {
        $random = rand(1, 1000);
        $md5    = md5(uniqid(md5(microtime(TRUE)), TRUE));
        return "$random$md5";
    }

    /**
     * Check given sender is email format
     *
     * @param string $sender
     *
     * @return bool
     */
    static function isEmailFormat(string $sender): bool
    {
        return filter_var($sender, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Is production satisfy two conditions which are
     * APP_DEBUG    is `false`
     * APP_ENV      is `production`
     *
     * @return bool
     */
    static function isProduction(): bool
    {
        return App::environment(Constant::ENVIRONMENT_PRODUCTION) && !env('APP_DEBUG');
    }

    /**
     * Remove white space and new line
     *
     * @param string $source
     *
     * @return string
     */
    static function removeWhiteSpaceAndNewLine(string $source): string
    {
        return preg_replace('/\s\s+/', '', trim($source));
    }

    /**
     * cf. https://gist.github.com/cjthompson/5485005
     * Compare two arrays and return a list of items only in array1 (deletions) and only in array2 (insertions)
     *
     * @param array $array1 The 'original' array, for comparison. Items that exist here only are considered to be deleted (deletions).
     * @param array $array2 The 'new' array. Items that exist here only are considered to be new items (insertions).
     * @param array|null $keysToCompare A list of array key names that should be used for comparison of arrays (ignore all other keys)
     *
     * @return array[] array with keys 'insertions' and 'deletions'
     */
    public static function arrayDifference(array $array1, array $array2, array $keysToCompare = NULL)
    {
//        dd($array1, $array2);

        $serialize = function (&$item, $idx, $keysToCompare) {
//            dd($item, is_array($item));
            if (is_array($item) && $keysToCompare) {
                $a = [];
                foreach ($keysToCompare as $k) {
                    if (array_key_exists($k, $item)) {
                        $a[$k] = $item[$k];
                    }
                }
                $item = $a;
            }
            $item = serialize($item);
        };

        $deserialize = function (&$item) {
            $item = unserialize($item);
        };

        array_walk($array1, $serialize, $keysToCompare);
        array_walk($array2, $serialize, $keysToCompare);

        // Items that are in the original array but not the new one
        $deletions  = array_diff($array1, $array2);
        $insertions = array_diff($array2, $array1);

        array_walk($insertions, $deserialize);
        array_walk($deletions, $deserialize);

        return ['insertions' => $insertions, 'deletions' => $deletions];
    }

    /**
     * Remove database index within given table
     *
     * @param string $tableName
     * @param string $column
     * @param bool $onlyCheckExists
     *
     * @return bool
     */
    public static function maybeRemoveDatabaseIndex(string $tableName, string $column, bool $onlyCheckExists = FALSE): bool
    {
        $prefix    = env('DB_PREFIX');
        $indexName = "{$tableName}_{$column}_unique";
        $results   = FALSE;

//        $index     = "{$prefix}{$indexName}";
        Schema::table($tableName, function (Blueprint $table) use ($indexName, $tableName, $prefix, $onlyCheckExists, &$results) {
            $combinedIndexes   = "$prefix$indexName";
            $combinedTableName = "$prefix$tableName";
            $collection        = collect(DB::select("SHOW INDEXES FROM $combinedTableName"));
            $isContains        = $collection->pluck('Key_name')->contains($combinedIndexes);

//            dd($collection, $indexName, $combinedIndexes, $onlyCheckExists);
            if ($onlyCheckExists) {
                $results = $isContains;
            } else {
                $table->dropUnique($combinedIndexes);
                $results = TRUE;
            }
        });

        return $results;
    }

    /**
     * Append query string with given url
     *
     * @param string $targetURL
     * @param array $queryStrings
     *
     * @return string
     */
    public static function appendQueryString(string $targetURL, array $queryStrings): string
    {
        return Request::create($targetURL)->fullUrlWithQuery($queryStrings);
    }

    /**
     * Generate last path component token
     *
     * @param int $length
     *
     * @return string
     * @throws Exception
     */
    static function generateBase64RandomString(int $length = 6): string
    {
        $characters       = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * @param string $key
     * @param string $value
     * @param string|null $underKey
     * @param bool $needLineBreak
     *
     * @return bool
     * @throws Exception
     */
    static function createNewEnvValue(string $key,
                                      string $value,
                                      string $underKey = NULL,
                                      bool   $needLineBreak = FALSE): bool
    {
        if ($underKey && !env($underKey)) {
            throw new Exception('underKey not found');
        }

        if (env($key)) {
            throw new Exception("key $key already exists, use func `updatePermanentEnvValue` instead");
        }

        // Always append line breaks and also wrapping double quotes around a value to prevent whitespace from being included in the value.
        $newKeyPair = "$key=\"$value\"\n";

        if ($underKey) {
            // Get the contents of the .env file, return array
            $contents = file(base_path('.env'));

            // Find the line of given key
            $specificKeyLine = 0;
            foreach ($contents as $line => $content) {
                if (strpos($content, $underKey) === 0) {
                    $specificKeyLine = $line;
                    break;
                }
            }

            // Append after the specific key
            $newContents  = $needLineBreak ? ["\n"] : [];
            $replacements = array_merge([$newKeyPair], $newContents);
            array_splice($contents, $specificKeyLine + 1, 0, $replacements);
        } else {
            // Get the contents of the .env file, return string
            $contents    = file_get_contents(base_path('.env'));
            $newContents = $needLineBreak ? "" : "\n";
            $contents    .= "$newKeyPair$newContents";
        }

//        dd($contents);

        return file_put_contents(base_path('.env'), $contents);
    }

    /**
     * @param $value
     *
     * @return bool
     */
    static function isArrayOrObject($value): bool
    {
        return is_array($value) || is_object($value);
    }

    /**
     * Remove permanent Env Value
     */
    static function removeEnvKeyPermanently($keyToRemove): bool
    {
        $envFilePath    = base_path('.env');
        $envFileContent = file_get_contents($envFilePath);

        // Find the line with the key and remove it
        $lines    = explode(PHP_EOL, $envFileContent);
        $newLines = [];
        $keyFound = FALSE;

        foreach ($lines as $line) {
            if (strpos($line, $keyToRemove . '=') === 0) {
                $keyFound = TRUE;
                continue;
            }
            $newLines[] = $line;
        }

        if ($keyFound) {
            // Save the modified content back to the .env file
            $newEnvFileContent = implode(PHP_EOL, $newLines);
            file_put_contents($envFilePath, $newEnvFileContent);
            return TRUE;
        } else {
            // Key not found, do nothing
            return FALSE;
        }
    }

    /**
     * cf. https://www.php.net/manual/en/function.bccomp.php
     *
     * @param $left
     * @param $right
     * @return bool
     */
    static function isTwoNumberEqual($left, $right)
    {
        // Returns
        // 0 if the two operands are equal,
        // 1 if the num1 is larger than the num2,
        // -1 otherwise.
        $result = bccomp($left, $right);
        return ($result === 0) ? TRUE : FALSE;
    }

    /**
     * cf. https://www.php.net/manual/en/function.fdiv.php
     *
     * @param $left
     * @param $right
     * @return float
     */
    static public function mathFloatDiv($left, $right)
    {
        if (intval($right) === 0) {
            return 0.0;
        }
        // Returns the floating point result of dividing the num1 by the num2.
        // If the num2 is zero, then one of INF, -INF, or NAN will be returned.
        return fdiv((floatval($left)), floatval($right));
    }

}
