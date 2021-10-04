<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\CreateRequest as Request;
use App\Models\Order;
use App\Models\Tariff;
use Dmgctrlr\LaraOsrm\LaraOsrm;
use Dmgctrlr\LaraOsrm\Models\LatLng;

class CreateController extends Controller
{
    public function __invoke(Request $r, LaraOsrm $osrm)
    {
        $tariff = Tariff::whereId($r->tariff_id)->firstOrFail();

        $osrmRequest = $osrm->route();

        $osrmRequest->setCoordinates([
            new LatLng($r->getOriginalLat(), $r->getOriginalLng()),
            new LatLng($r->getDestinationLat(), $r->getDestinationLng()),
        ]);

        $response = $osrmRequest->send();

        abort_if(!$response->isOk(), 503, 'couldnt connect to osrm');

        $recommendedRoute = $response->getFirstRoute();
        $km = $recommendedRoute->getDistance('km');
        $minutes = $recommendedRoute->getRouteData()->duration / 60;

        $order = new Order($r->only([
            'original_address',
            'destination_address',
            'original_coordinates',
            'destination_coordinates'
        ]));

        $order->minimal_cost = $tariff->minimal_cost;
        $order->counted_cost_km = $tariff->cost_per_km * $km;
        $order->counted_cost_minutes = $tariff->cost_per_minute * $minutes;
        $order->total_cost = $tariff->countFinalCost($km, $minutes);
        $order->status = 'NEW';

        $order->save();

        return response([
            'success' => true,
            'data'    => $order
        ]);
    }
}