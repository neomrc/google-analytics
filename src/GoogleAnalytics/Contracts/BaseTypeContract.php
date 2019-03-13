<?php

namespace GoogleAnalytics\Contracts;

interface BaseTypeContract
{
    public function getRequiredFields(): array;
    public function setTrackingId(string $id): self;
    public function setClientId(string $id): self;
    public function setUserId(string $id): self;
    public function send(array $data = []): void;
}
