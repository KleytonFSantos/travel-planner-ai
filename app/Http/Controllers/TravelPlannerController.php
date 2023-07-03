<?php

namespace App\Http\Controllers;

use App\Http\Requests\TravelPlannerRequest;
use App\Http\Services\OpenApiResponseService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class TravelPlannerController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('TravelPlanner');
    }

    public function show(
        TravelPlannerRequest $request,
        OpenApiResponseService $apiResponseService
    ): RedirectResponse|Response {
        try {
            $planner = $apiResponseService->getResponse($request->validated());

            return Inertia::render('TravelPlanner', [
                'planner' => $planner,
            ]);
        } catch (Exception $exception) {
            return back($exception->getCode())->with(['message' => 'Ops! Ocorreu um erro inesperado!']);
        }
    }
}
