<?php

namespace MediaGal\Core\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Returns a successful JSON response.
     *
     * @param array $data
     * @return void
     */
    protected function jsonSuccess(array $data = [])
    {
        $response = ['success' => true];

        if (!empty($data)) {
            $response['data'] = $data;
        }

        return response()->json($response);
    }
}
