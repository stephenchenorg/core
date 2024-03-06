<?php

namespace Stephenchen\Core\Utilities;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log as LaravelLog;
use Stephenchen\Core\Constant\Constant;

final class Log
{
    /**
     * Beautify the log output with `emergency` level
     *
     * @param string $title
     * @param mixed $messages
     */
    public static function emergency(string $title, mixed $messages): void
    {
        if (App::environment(Constant::ENVIRONMENT_LOCAL)) return;

        $messages = Utility::toString($messages);

        // @TODO: Line notify or something else
        LaravelLog::channel('emergency')->emergency("========= $title ========= \n");
        LaravelLog::channel('emergency')->emergency("$messages \n");
    }

    /**
     * Beautify the log output with `alert` level
     *
     * @param string $title
     * @param mixed $messages
     */
    public static function alert(string $title, mixed $messages): void
    {
        if (App::environment(Constant::ENVIRONMENT_LOCAL)) return;

        $messages = Utility::toString($messages);

        // @TODO: Line notify or something else
        LaravelLog::channel('alert')->alert("========= $title ========= \n");
        LaravelLog::channel('alert')->alert("$messages \n");
    }

    /**
     * Beautify the log output with `critical` level
     *
     * @param string $title
     * @param mixed $messages
     */
    public static function critical(string $title, mixed $messages): void
    {
        if (App::environment(Constant::ENVIRONMENT_LOCAL)) return;

        $messages = Utility::toString($messages);

        // @TODO: Line notify or something else
        LaravelLog::driver('critical')->critical("========= $title ========= \n");
        LaravelLog::driver('critical')->critical("$messages \n");
    }

    /**
     * Beautify the log output with `error` level
     *
     * @param string $title
     * @param mixed $messages
     */
    public static function error(string $title, mixed $messages): void
    {
        if (App::environment(Constant::ENVIRONMENT_LOCAL)) return;

        $messages = Utility::toString($messages);

        // @TODO: Line notify or something else
        LaravelLog::channel('error')->error("========= $title ========= \n");
        LaravelLog::channel('error')->error("$messages \n");
    }

    /**
     * Beautify the log output with `warning` level
     *
     * @param string $title
     * @param mixed $messages
     */
    public static function warning(string $title, mixed $messages): void
    {
        if (App::environment(Constant::ENVIRONMENT_LOCAL)) return;

        $messages = Utility::toString($messages);

        // @TODO: Line notify or something else
        LaravelLog::channel('warning')->warning("========= $title ========= \n");
        LaravelLog::channel('warning')->warning("$messages \n");
    }

    /**
     * Beautify the log output with `notice` level
     *
     * @param string $title
     * @param mixed $messages
     */
    public static function notice(string $title, mixed $messages): void
    {
        if (App::environment(Constant::ENVIRONMENT_LOCAL)) return;

        $messages = Utility::toString($messages);

        // @TODO: Line notify or something else
        LaravelLog::channel('notice')->notice("========= $title ========= \n");
        LaravelLog::channel('notice')->notice("$messages \n");
    }

    /**
     * Beautify the log output with `info` level
     *
     * @param string $title
     * @param mixed $messages
     */
    public static function info(string $title, mixed $messages): void
    {
        if (App::environment(Constant::ENVIRONMENT_LOCAL)) return;

        $messages = Utility::toString($messages);

        // @TODO: Line notify or something else
        LaravelLog::channel('info')->info("========= $title ========= \n");
        LaravelLog::channel('info')->info("$messages \n");
    }

    /**
     * Beautify the log output with `debug` level
     *
     * @param string $title
     * @param mixed $messages
     */
    public static function debug(string $title, mixed $messages): void
    {
        if (App::environment(Constant::ENVIRONMENT_LOCAL)) return;

        $messages = Utility::toString($messages);

        LaravelLog::channel('debug')->debug("========= $title ========= \n");
        LaravelLog::channel('debug')->debug("$messages \n");
    }
}
