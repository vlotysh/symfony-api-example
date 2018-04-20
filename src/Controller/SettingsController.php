<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Settings;

class SettingsController
{
    /**
     * @Route("/settings")
     * @Method("GET")
     */
    public function getSettings(Request $request)
    {
        $param = $request->get('filter');
        $result = [];

        $settings = new Settings();
        $settings->setAllowedCheckInTime(3600);
        $settings->setAllowedUnCheckInTime(600);
        $settings->setCheckInRadiusInMeters(10000);

        if ($param) {
            $result[$param] = $settings->$param; //magic method
        } else {
            $result = $settings->toArray();
        }

        return new JsonResponse($result);
    }
}