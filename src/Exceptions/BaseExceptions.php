<?php

namespace Stephenchen\Core\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Stephenchen\Core\Constant\Constant;
use Stephenchen\Core\Service\ErrorMessageObject;
use Stephenchen\Core\Traits\ResponseJsonTrait;
use Stephenchen\Core\Utilities\Log;
use Stephenchen\Core\Utilities\Utility;

abstract class BaseExceptions extends Exception
{
    use ResponseJsonTrait;

    /**
     * @var ErrorMessageObject|null
     */
    public ?ErrorMessageObject $errorMessageObject = NULL;

    /**
     * Render the exception into an HTTP response.
     *
     * @return Response
     */
    public function render(): Response
    {
        $code    = $this->messageCode();
        $message = Utility::isStringEmptyOrNull($this->message)
            ? $this->localization()
            : $this->message;

        // If message object is set, override message and code
        $messageObject = $this->getErrorMessageObject();
        if ($messageObject) {
            $code    = $messageObject->getCode();
            $message = $messageObject->getLocalMessage();
        }

        // Http status code
        $httpStatusCode = $this->statusCode();

        if (App::environment(Constant::ENVIRONMENT_PRODUCTION)) {
            Log::error('Exception：', $message);
        }

//        dd([
//            'message'               => $this->getErrorMessageObject(),
//            'code for localization' => $code,
//            'code for http status'  => $httpStatusCode,
//        ]);

        return $this->jsonFail($message, $code, $httpStatusCode);
    }

    /**
     * @return ErrorMessageObject|null
     */
    public function getErrorMessageObject(): ?ErrorMessageObject
    {
        return $this->errorMessageObject;
    }

    /**
     * @param ErrorMessageObject|null $errorMessageObject
     *
     * @return BaseExceptions
     */
    public function setErrorMessageObject(?ErrorMessageObject $errorMessageObject): BaseExceptions
    {
        $this->errorMessageObject = $errorMessageObject;
        return $this;
    }

    /**
     * localization message
     */
    abstract public function messageCode(): int;

    /**
     * localization message
     */
    abstract public function localization(): string;

    /**
     * Http status code, diff from the error code
     */
    abstract public function statusCode(): int;

    /**
     * Description
     */
    abstract public function description(): string;
}
