<?php

namespace Docker\API\Exception;

class ContainerResizeInternalServerErrorException extends InternalServerErrorException
{
    private $errorResponse;
    public function __construct(\Docker\API\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('cannot resize container', 500);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}
