<?php

namespace Neomrc\GoogleAnalytics\HitTypes;

use GoogleAnalytics\Contracts\BaseTypeContract;

class PageView extends HitTypeAbstract
{
    /**
     * PageView document hostname
     */
    const PAGEVIEW_DOCUMENT_HOSTNAME = 'dh';

    /**
     * PageView page
     */
    const PAGEVIEW_PAGE = 'dp';

    /**
     * PageView title
     */
    const PAGEVIEW_TITLE = 'dt';

    public function __construct()
    {
        $this->hitType = 'pageview';
    }

    /**
     * Get required fields
     *
     * @return array
     */
    public function getRequiredFields(): array
    {
        return [];
    }

    /**
     * Set pageview document hostname
     *
     * @param string $documentHostname
     * @return BaseTypeContract
     */
    public function setDocumentHostname(string $documentHostname): BaseTypeContract
    {
        $this->typeData[self::PAGEVIEW_DOCUMENT_HOSTNAME] = $documentHostname;
        return $this;
    }

    /**
     * Set pageview page
     *
     * @param string $page
     * @return BaseTypeContract
     */
    public function setPage(string $page): BaseTypeContract
    {
        $this->typeData[self::PAGEVIEW_PAGE] = $page;
        return $this;
    }

    /**
     * Set pageview title
     *
     * @param string $title
     * @return BaseTypeContract
     */
    public function setTitle(string $title): BaseTypeContract
    {
        $this->typeData[self::PAGEVIEW_TITLE] = $title;
        return $this;
    }
}
