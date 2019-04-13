<?php

namespace Neomrc\GoogleAnalytics;

use GoogleAnalytics\Exceptions\TypeNotFoundException;

class GoogleAnalyticsService
{
    public function track(string $hitType)
    {
        $hitClassToBuild = 'App\\Services\\Analytics\\Google\\HitTypes\\' . studly_case($hitType);

        if (!class_exists($hitClassToBuild)) {
            throw new TypeNotFoundException('Google hit type class not found!');
        }

        return new $hitClassToBuild;
    }
}
