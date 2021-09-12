<?php

namespace Docker\API\Model;

class ContainerSummaryNetworkSettings
{
    /**
     *
     *
     * @var EndpointSettings[]|null
     */
    protected $networks;
    /**
     *
     *
     * @return EndpointSettings[]|null
     */
    public function getNetworks(): ?iterable
    {
        return $this->networks;
    }
    /**
     *
     *
     * @param EndpointSettings[]|null $networks
     *
     * @return self
     */
    public function setNetworks(?iterable $networks): self
    {
        $this->networks = $networks;
        return $this;
    }
}
