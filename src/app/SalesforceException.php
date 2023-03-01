<?php


namespace PixellWeb\Zoho\app;


class SalesforceException extends \Exception
{
    /**
     * ReferentielApiException constructor.
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        \Log::channel('salesforce')->alert($message);
    }
}
