<?php

namespace Docker\API\Exception;

class ConfigUpdateNotFoundException extends NotFoundException
{
    private $errorResponse;
    public function __construct(\Docker\API\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('no such config', 404);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}
