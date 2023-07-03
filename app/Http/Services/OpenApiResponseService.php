<?php

namespace App\Http\Services;

use App\Http\Resolvers\PromptResolver;
use OpenAI\Laravel\Facades\OpenAI;

class OpenApiResponseService
{
    const MODEL = 'text-davinci-003';

    const MAX_TOKENS = 500;

    public function __construct(private readonly PromptResolver $promptResolver)
    {
    }

    public function getResponse(array $request): string
    {
        $promptMessage = $this->promptResolver->getMessage($request);

        $result = OpenAI::completions()->create([
            'model' => self::MODEL,
            'max_tokens' => self::MAX_TOKENS,
            'prompt' => $promptMessage,
        ]);

        return $result['choices'][0]['text'];
    }
}
