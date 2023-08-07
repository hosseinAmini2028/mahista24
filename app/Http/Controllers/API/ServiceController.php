<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    /**
     * @lrd:start
     * Get available services
     * @lrd:end
     */
    public function index()
    {
        $services = [
            [
                'name' => 'هتل',
                'slug' => 'hotel',
            ],
            [
                'name' => 'تور',
                'slug' => 'tour',
            ],
            [
                'name' => 'بلیط هواپیما',
                'slug' => 'airplane',
            ],
            [
                'name' => 'بلیط قطار',
                'slug' => 'train',
            ],
        ];

        return response()->json([
            'success' => true,
            'message' => 'services list',
            'data' => $services
        ]);
    }
}
