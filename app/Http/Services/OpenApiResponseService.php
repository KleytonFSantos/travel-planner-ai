<?php

namespace App\Http\Services;

use OpenAI\Laravel\Facades\OpenAI;

class OpenApiResponseService
{
    const MODEL = 'text-davinci-003';

    public function getResponse(array $request): string
    {
        $locale = $request['locale'];
        $startDate = $request['startDate'];
        $endDate = $request['endDate'];

        $result = OpenAI::completions()->create([
            'model' => self::MODEL,
            'max_tokens' => 500,
            'prompt' => 'Faça um plano de viagem para '
                .$locale.' entre os dias  '
                .$startDate.' até '
                .$endDate,
        ]);

        return $result['choices'][0]['text'];
    }
}
