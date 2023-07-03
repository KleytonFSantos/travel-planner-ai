<?php

namespace App\Http\Services;

use App\Http\DTO\PromptMessageDto;
use App\Http\Resolvers\PromptResolver;
use OpenAI\Laravel\Facades\OpenAI;

class OpenApiResponseService
{
    public function __construct(
        private readonly PromptResolver $promptResolver,
    ) {
    }

    public function getResponse(array $request): string
    {
        $promptMessageDto = new PromptMessageDto($request);
        $promptMessage = $this->promptResolver->getMessage($promptMessageDto);

        $result = OpenAI::completions()->create([
            'model' => config('openai.model'),
            'max_tokens' => config('openai.max_tokens'),
            'prompt' => $promptMessage,
        ]);

        return $result['choices'][0]['text'];
    }
}
