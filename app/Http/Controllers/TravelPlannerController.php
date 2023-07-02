<?php

namespace App\Http\Controllers;

use App\Http\Requests\TravelPlannerRequest;
use Carbon\Carbon;
use Inertia\Inertia;
use Inertia\Response;
use OpenAI\Laravel\Facades\OpenAI;

class TravelPlannerController extends Controller
{
    CONST MODEL = 'text-davinci-003';

    public function index(TravelPlannerRequest $request): Response
    {
        return Inertia::render('TravelPlanner');
    }

    public function show(TravelPlannerRequest $request): Response
    {
         $locale = $request->validated('locale');
         $startDate = $request->validated('startDate');
         $endDate = $request->validated('endDate');

         $result = OpenAI::completions()->create([
             'model' => self::MODEL,
             'max_tokens' => 500,
             'prompt' =>
                 'Faça um plano de viagem para '
                 . $locale . ' entre os dias  '
                 . $startDate . ' até '
                 . $endDate,
         ]);

        return Inertia::render('TravelPlanner',         [
            'planner' => $result['choices'][0]['text']
        ]);
    }
}
