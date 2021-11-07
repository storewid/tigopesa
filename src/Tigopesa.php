<?php

/**
 * Author: Emmanuel Paul Mnzava
 * Twitter: @epmnzava
 * Email: epmnzava@gmail.com
 * Github:https://github.com/dbrax/tigopesa-tanzania
 * 
 */

namespace Storewid\Tigopesa;


class Tigopesa
{

    private $clientid;
    private $clientsecret;
    private $endpoint;
    private  $account_number,
        $pin,
        $account_id,
        $redirect_url,
        $callback_url,
        $lang,
        $currency;


    public function __construct(
        $endpoint,
        $clientid,
        $clientsecret,
        $account_number,
        $pin,
        $account_id,
        $redirect_url,
        $callback_url,
        $lang,
        $currency
    ) {
        $this->clientid = $clientid;
        $this->clientsecret = $clientsecret;
        $this->endpoint = $endpoint;
        $this->account_id = $account_id;
        $this->pin = $pin;
        $this->lang = $lang;
        $this->account_number = $account_number;
        $this->callback_url = $callback_url;
        $this->currency = $currency;
        $this->redirect_url = $redirect_url;
    }


    /**
     *  Fetch access_token
     */
    private function access_token()
    {

        $base_url = $this->endpoint;
        $client_secret = $this->clientsecret;
        $client_id = $this->clientid;

        $api = new TigoUtil(
            $client_id,
            $client_secret,
            $base_url,
            $this->account_number,
            $this->pin,
            $this->account_id,
            $this->redirect_url,
            $this->callback_url,
            $this->lang,
            $this->currency
        );

        $tokenArray = json_decode($api->get_access_token());
        $this->issuedToken = $tokenArray->accessToken;
    }

    /**
     * make_payment
     *
     * @param $customer_firstname
     * @param $customer_lastname
     * @param $customer_email
     * @param $amount
     * @param $reference_id
     * @return mixed
     */
    public function processpayment(
        $customer_firstname,
        $customer_lastname,
        $customer_email,
        $amount,
        $reference_id
    ) {

        $base_url = $this->endpoint;
        $client_secret = $this->clientsecret;
        $client_id = $this->clientid;
        $this->access_token();

        $api = new TigoUtil(
            $client_id,
            $client_secret,
            $base_url,
            $this->account_number,
            $this->pin,
            $this->account_id,
            $this->redirect_url,
            $this->callback_url,
            $this->lang,
            $this->currency
        );



        $response = $api->makePaymentRequest(
            $this->issuedToken,
            $amount,
            $reference_id,
            $customer_firstname,
            $customer_lastname,
            $customer_email
        );


        return json_decode($response);
    }

    /**
     * @param string $prefix
     * @param int $length
     *
     * @return string
     * @throws \Exception
     */
    public function random_reference($prefix = 'TIGOPESA', $length = 15)
    {
        $keyspace = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $str = '';

        $max = mb_strlen($keyspace, '8bit') - 1;

        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }

        return $prefix . $str;
    }
}
