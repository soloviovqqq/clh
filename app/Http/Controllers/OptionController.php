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
        $sales = Option::query()->distinct()->pluck('sale')->toArray();
        $url = $request->input('url', '');
        if(!Str::contains($url, $sales)) {
            throw ValidationException::withMessages(['url' => 'This value is incorrect']);
        }
        $options = Option::query()
            ->where('sale', $this->getSale($url, $sales))
            ->get()
            ->pluck('text');

        return response()->json($options);
    }

    /**
     * @param string $url
     * @param iterable $sales
     * @return string
     */
    private function getSale(string $url, iterable $sales): string
    {
        foreach ($sales as $sale) {
            if(Str::contains($url, $sale)) {
                return $sale;
            }
        }
    }
}
