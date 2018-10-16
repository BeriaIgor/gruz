<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class SearchController extends Controller
{
    /**
     * Запрос подсказок адреса в сервисеЯндекса.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function apiTips(Request $request)
    {
        if ( ! is_null($search = $request->get('search'))) {
            $client = new \GuzzleHttp\Client();
            $response = $client->request(
                'GET',
                'https://geocode-maps.yandex.ru/1.x/?apikey=e3eec604-4859-490a-9083-032128f26011&format=json&results=6&geocode=' . $search
            );

            if ($response->getStatusCode() == 200) {
                $results = json_decode($response->getBody()->getContents());
                if ($results) {
                    $tips = [];
                    foreach($results->response->GeoObjectCollection->featureMember as $result) {
                        $tips[] = $result->GeoObject->metaDataProperty->GeocoderMetaData->text;
                    }
                }

                // Сохранение запроса и результатат в базу
                $log = new Log();
                $log->search = $search;
                $log->result = implode('|', $tips);
                $log->save();

                return new JsonResponse($tips);
            }
        }

        return new JsonResponse([]);
    }

    public function getLogs()
    {
        $logs = Log::all();

        return view('logs/index', ['logs' => $logs]);
    }
}
