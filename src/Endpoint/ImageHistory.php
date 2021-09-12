<?php

namespace Docker\API\Endpoint;

class ImageHistory extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;
    protected $name;
    /**
     * Return parent layers of an image.
     *
     * @param string $name Image name or ID
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{name}'), array($this->name), '/images/{name}/history');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Docker\API\Exception\ImageHistoryNotFoundException
     * @throws \Docker\API\Exception\ImageHistoryInternalServerErrorException
     *
     * @return null|\Docker\API\Model\ImagesNameHistoryGetResponse200Item[]
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'Docker\\API\\Model\\ImagesNameHistoryGetResponse200Item[]', 'json');
        }
        if (404 === $status) {
            throw new \Docker\API\Exception\ImageHistoryNotFoundException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \Docker\API\Exception\ImageHistoryInternalServerErrorException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array();
    }
}
