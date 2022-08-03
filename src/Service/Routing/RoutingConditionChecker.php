<?php

declare(strict_types=1);

namespace App\Service\Routing;

use Symfony\Bundle\FrameworkBundle\Routing\Attribute\AsRoutingConditionService;
use Symfony\Component\HttpFoundation\Request;

#[AsRoutingConditionService('app.routing.condition.checker')]
class RoutingConditionChecker
{
    public function isRequestBodyNotEmpty(Request $request): bool
    {
        return !empty($request->getContent());
    }
}
