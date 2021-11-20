<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

/**
 * Class OptionController
 * @package App\Http\Controllers
 */
class OptionController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function getOptions(Request $request): JsonResponse
    {
        $url = $request->input('url', '');
        if(!Str::contains($url, Option::SALES)) {
            throw ValidationException::withMessages(['url' => 'This value is incorrect']);
        }
        $options = Option::query()
            ->where('sale', $this->getSale($url))
            ->get()
            ->pluck('text');

        return response()->json($options);
    }

    /**
     * @param string $url
     * @return string
     */
    private function getSale(string $url): string
    {
        if(Str::contains($url, Option::UMEE_SALE)) {
            return Option::UMEE_SALE;
        }
    }
}
