<?php

namespace Docker\API\Exception;

class ContainerKillInternalServerErrorException extends InternalServerErrorException
{
    private $errorResponse;
    public function __construct(\Docker\API\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('server error', 500);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}
