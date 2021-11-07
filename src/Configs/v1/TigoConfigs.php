<?php

/**
 * Author: Emmanuel Paul Mnzava
 * Twitter: @epmnzava
 * Email: epmnzava@gmail.com
 * Github:https://github.com/dbrax/tigopesa-tanzania
 * This class contains all api calls ..
 */

namespace Storewid\Tigosecure\Configs\V1;

class TigoConfigs
{



    public  const ACCESS_TOKEN_ENDPOINT = "/v1/oauth/generate/accesstoken?grant_type=client_credentials";

    public const PAYMENT_AUTHORIZATION_ENDPOINT = "/v1/tigo/payment-auth/authorize";
}
