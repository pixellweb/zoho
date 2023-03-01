<?php


namespace Zoho\app;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Api
 * @package App\Citadelle
 */
class Api
{
    /**
     * @var string
     */
    protected $url = null;

    /**
     * @var string
     */
    protected $token;


    /**
     * Api constructor.
     */
    public function __construct()
    {
        $this->token = $this->geAccessToken();
        $this->url = config('zoho.api.url');
    }

    protected function geAccessToken()
    {
        $client = new Client([
                'base_uri' => config('zoho.api.url_authorize')
            ]
        );

        $headers = [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ];

        $url = config('zoho.api.url_authorize') . '?refresh_token=' . config('zoho.api.refresh_token') . '&client_id=' . config('zoho.api.client_id') . '&client_secret=' . config('zoho.api.client_secret') . '&grant_type=refresh_token';

        try {
            $response = $client->get( $url, $headers );

            if ($response->getStatusCode() != 200 or empty($response->getBody()->getContents())) {
                throw new ZohoException("Impossible de récupèrer le token (" . $response->getStatusCode() . ")");
            }

        } catch (RequestException $exception) {
            throw new ZohoException("Api::geAccessToken : " . $exception->getMessage());
        }

        return 'Zoho-oauthtoken '.json_decode($response->getBody(), true)['access_token'];
    }


    /**
     * @param string $ressource_path
     * @return array
     * @throws ZohoException
     */
    public function get(string $ressource_path): array
    {
        $client = new Client([
                'base_uri' => $this->url
            ]
        );

        $headers = [
            'headers' => [
                'Zoho-oauthtoken' => $this->token,
            ]
        ];

        try {
            $response = $client->get($ressource_path, $headers);

            if ($response->getStatusCode() != 200 or empty($response->getBody()->getContents())) {
                throw new ZohoException("Api::get : code http error (" . $response->getStatusCode() . ") ou body vide : " . $ressource_path);
            }

            return json_decode($response->getBody(), true);

        } catch (RequestException $exception) {
            /*$errors['request'] = Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                $errors['response'] = Psr7\Message::toString($e->getResponse());
            }*/

            throw new ZohoException("Api::get : " . $exception->getMessage());
        }
    }

    /**
     * @param string $ressource_path
     * @param array $params
     * @return array
     * @throws ZohoException|GuzzleException
     */
    public function post(string $ressource_path, array $params): array
    {
        $client = new Client(['base_uri' => $this->url]);
        $headers = [
            'headers' => [
                'Authorization' => $this->token,
            ],
            'json' => $params
        ];

        try {

            $response = $client->request('POST', $ressource_path, $headers);

            return json_decode($response->getBody(), true);

        } catch (RequestException $exception) {

            throw new ZohoException("Api::post : " . $exception->getMessage() . ' '.print_r($params,true));
        }
    }
}
