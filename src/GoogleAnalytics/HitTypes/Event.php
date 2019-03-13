<?php

namespace GoogleAnalytics\HitTypes;

use GoogleAnalytics\Contracts\BaseTypeContract;

class Event extends HitTypeAbstract
{
    /**
     * Event category
     */
    const EVENT_CATEGORY = 'ec';

    /**
     * Event action
     */
    const EVENT_ACTION = 'ea';

    /**
     * Event label
     */
    const EVENT_LABEL = 'el';

    /**
     * Event value
     */
    const EVENT_VALUE = 'ev';

    public function __construct()
    {
        $this->hitType = 'event';
    }

    /**
     * Get required fields
     *
     * @return array
     */
    public function getRequiredFields(): array
    {
        return [self::EVENT_CATEGORY, self::EVENT_ACTION];
    }

    /**
     * Set event category
     *
     * @param string $category
     * @return BaseTypeContract
     */
    public function setCategory(string $category): BaseTypeContract
    {
        $this->typeData[self::EVENT_CATEGORY] = $category;
        return $this;
    }

    /**
     * Set event action
     *
     * @param string $action
     * @return BaseTypeContract
     */
    public function setAction(string $action): BaseTypeContract
    {
        $this->typeData[self::EVENT_ACTION] = $action;
        return $this;
    }

    /**
     * Set event label
     *
     * @param string $label
     * @return BaseTypeContract
     */
    public function setLabel(string $label): BaseTypeContract
    {
        $this->typeData[self::EVENT_LABEL] = $label;
        return $this;
    }

    /**
     * Set event value
     *
     * @param string $value
     * @return BaseTypeContract
     */
    public function setValue(string $value): BaseTypeContract
    {
        $this->typeData[self::EVENT_VALUE] = $value;
        return $this;
    }
}
