<?php

namespace App\Http\Resolvers;

use App\Http\DTO\PromptMessageDto;

class PromptResolver
{
    public function getMessage(PromptMessageDto $promptMessageDto): string
    {
        return 'Faça um plano de viagem para '
            .$promptMessageDto->getLocale().' entre os dias '
            .$promptMessageDto->getStartDate().' até '
            .$promptMessageDto->getEndDate();
    }
}
