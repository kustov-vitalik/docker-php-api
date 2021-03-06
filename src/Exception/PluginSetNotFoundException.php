<?php

namespace Docker\API\Exception;

class PluginSetNotFoundException extends NotFoundException
{
    private $errorResponse;
    public function __construct(\Docker\API\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('Plugin not installed', 404);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}
