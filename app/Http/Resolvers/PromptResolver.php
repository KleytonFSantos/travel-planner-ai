<?php

namespace App\Http\Resolvers;

class PromptResolver
{
    public function getMessage($request): string
    {
        return 'Faça um plano de viagem para '
            .$request['locale'].' entre os dias '
            .$request['startDate'].' até '
            .$request['endDate'];
    }
}
