<?php
namespace Cullenio;

class SteamAuth {

    private $openid;
    public $user;
    public $authUrl;

    public function __construct() {
        $this->openid = new \LightOpenID();
        $this->openid->realm = \Config::get('steam_auth.realm'));
        $this->openid->returnUrl = $this->openid->realm . "/openid/done";

        $this->user = $this->getUser();
        $this->authUrl = $this->getLoginURL();
    }

    private function getUser() {
        if ($this->openid->mode) {
            if ($this->openid->validate()) {
                $id = $this->openid->identity;
                $ptn = "/^http:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
                preg_match($ptn, $id, $matches);

                return $matches[1];
            }
        }
        return null;
    }

    private function getLoginURL() {
        $this->openid->identity = 'http://steamcommunity.com/openid';
        return $this->openid->authUrl();
    }

}
