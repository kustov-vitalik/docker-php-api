<?php

namespace Docker\API\Endpoint;

class VolumeCreate extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;
    /**
     *
     *
     * @param \Docker\API\Model\VolumesCreatePostBody $volumeConfig Volume configuration
     */
    public function __construct(\Docker\API\Model\VolumesCreatePostBody $volumeConfig)
    {
        $this->body = $volumeConfig;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/volumes/create';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return $this->getSerializedBody($serializer);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Docker\API\Exception\VolumeCreateInternalServerErrorException
     *
     * @return null|\Docker\API\Model\Volume
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (201 === $status) {
            return $serializer->deserialize($body, 'Docker\\API\\Model\\Volume', 'json');
        }
        if (500 === $status) {
            throw new \Docker\API\Exception\VolumeCreateInternalServerErrorException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array();
    }
}
