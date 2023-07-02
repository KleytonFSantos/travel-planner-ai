<?php

namespace App\Http\Controllers;

use App\Http\Requests\TravelPlannerRequest;
use Inertia\Inertia;
use OpenAI\Laravel\Facades\OpenAI;

class TravelPlannerController extends Controller
{
    CONST MODEL = 'text-davinci-003';

    public function __invoke(TravelPlannerRequest $request)
    {
        return Inertia::render('TravelPlanner');
        // $locale = $request->validated('locale');
        // $startDate = $request->validated('startDate');
        // $endDate = $request->validated('endDate');

        // $result = OpenAI::completions()->create([
        //     'model' => self::MODEL,
        //     'max_tokens' => 500,
        //     'prompt' =>
        //         'Faça um plano de viagem para '
        //         . $locale . ' entre os dias  '
        //         . $startDate . ' e '
        //         . $endDate,
        // ]);

        // return $result['choices'][0]['text'];
    }
}
