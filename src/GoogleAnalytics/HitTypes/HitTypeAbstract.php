<?php

namespace Neomrc\GoogleAnalytics\HitTypes;

use GuzzleHttp\Client;
use GoogleAnalytics\Contracts\BaseTypeContract;
use GoogleAnalytics\Exceptions\InvalidTrackingIdException;
use GoogleAnalytics\Exceptions\InvalidClientIdException;
use GoogleAnalytics\Exceptions\InvalidUserIdException;
use GoogleAnalytics\Exceptions\NotDeliveredException;
use GoogleAnalytics\Exceptions\RequiredFieldsMissingException;

abstract class HitTypeAbstract implements BaseTypeContract
{
    /**
     * Analytics version
     */
    const ANALYTICS_VERSION = 'v';

    /**
     * Analytics tracking id
     */
    const TRACKING_ID = 'tid';

    /**
     * Hit type to be dispatch/recorded on analytics
     */
    const HIT_TYPE = 't';

    /**
     * User id for tracking
     */
    const USER_ID = 'uid';

    /**
     * Client id for tracking
     */
    const CLIENT_ID = 'cid';

    /**
     * Version
     *
     * @var integer
     */
    protected $version = 1;

    /**
     * Analytics post endpoint
     *
     * @var string
     */
    protected $sendEndpoint = 'www.google-analytics.com/collect';

    /**
     * GA hit type
     *
     * @var string
     */
    protected $hitType;

    /**
     * GA tracking id
     *
     * @var string
     */
    private $trackingId;

    /**
     * User id
     *
     * @var string
     */
    private $userId;

    /**
     * Client id
     *
     * @var string
     */
    private $clientId;

    /**
     * Type data
     *
     * @var array
     */
    public $typeData = [];

    /**
     * Set tracking id
     *
     * @param string $id
     * @return BaseTypeContract
     * 
     * @throws InvalidTrackingIdException
     */
    public function setTrackingId(string $id): BaseTypeContract
    {
        if (!$id) {
            throw new InvalidTrackingIdException('Invalid tracking id!');
        }

        $this->trackingId = $id;
        return $this;
    }

    /**
     * Set user id
     *
     * @param string $id
     * @return BaseTypeContract
     * 
     * @throws InvalidUserIdException
     */
    public function setUserId(string $id): BaseTypeContract
    {
        if (!$id) {
            throw new InvalidUserIdException('Invalid client id!');
        }

        $this->userId = $id;
        return $this;
    }

    /**
     * Set client id
     *
     * @param string $id
     * @return BaseTypeContract
     * 
     * @throws InvalidClientIdException
     */
    public function setClientId(string $id): BaseTypeContract
    {
        if (!$id) {
            throw new InvalidClientIdException('Invalid client id!');
        }

        $this->clientId = $id;
        return $this;
    }

    /**
     * Get builded data
     *
     * @return array
     * 
     * @throws RequiredFieldsMissingException
     */
    private function getData(): array
    {
        $requiredFields = $this->getRequiredFields();

        if (!array_has($this->typeData, $requiredFields)) {
            throw new RequiredFieldsMissingException(
                sprintf('%s type field(s): [%s] are missing!', $this->hitType, implode(', ', $requiredFields))
            );
        }

        return $this->typeData;
    }

    /**
     * Send GA data
     *
     * @param array $data
     * @return void
     * 
     * @throws NotDeliveredException
     */
    public function send(array $data = []): void
    {
        try {
            $baseData = array_merge($this->getData(), [
                // version
                self::ANALYTICS_VERSION => $this->version,
                // ga tracking id
                self::TRACKING_ID       => $this->trackingId,
                // ga "hit" type
                self::HIT_TYPE          => $this->hitType,
            ]);

            if (!empty($this->userId)) {
                $baseData[self::USER_ID] = $this->userId;
            }
    
            if (!empty($this->clientId)) {
                $baseData[self::CLIENT_ID] = $this->clientId;
            }

            $guzzleClient = new Client();
            $guzzleClient->request('POST', $this->sendEndpoint, [
                'form_params' => array_merge($baseData, $data),
            ]);
        } catch (\Exception $e) {
            throw new NotDeliveredException($e->getMessage());
        }
    }
}
