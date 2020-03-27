<?php

namespace App\Controller;

use http\Client;
use http\QueryString;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CoronaStatisticsController extends AbstractController
{
    public function index()
    {
        return $this->render('index.html');
    }

    public function getCountryData()
    {
        $postData = Request::createFromGlobals();

        $client = new Client();
        $request = new Client\Request();

        $request->setRequestUrl('https://covid-193.p.rapidapi.com/statistics');
        $request->setRequestMethod('GET');
        $request->setQuery(
            new QueryString(
                [
                    'country' => $postData->request->get('country'),
                ]
            )
        );

        $request->setHeaders(
            [
                'x-rapidapi-host' => 'covid-193.p.rapidapi.com',
                'x-rapidapi-key'  => 'e9f77e0812msh0feb33ddc8635bcp12be6ejsnd30c87e24d57',
            ]
        );

        $client->enqueue($request)->send();
        $response = $client->getResponse();
        $countryData = [];
//        foreach ($response['response'] as $cases)
//        {
//            $data = [];
//            $data['cases'] = $cases['cases'];
//            $data['']
//            $countryData[] = $data;
//        }
        $this->json(array_reverse($countryData));
    }
}