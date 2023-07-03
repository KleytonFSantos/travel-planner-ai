<?php

namespace App\Http\Resolvers;

class PromptResolver
{
    public function getMessage($request): string
    {
        $locale = $request['locale'];
        $startDate = $request['startDate'];
        $endDate = $request['endDate'];

        return 'Faça um plano de viagem para '
            .$locale.' entre os dias '
            .$startDate.' até '
            .$endDate;
    }
}
