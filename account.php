<?php
class account{
  private $user_name;
  private $secret_key;
  private $access_token;
  private $app_id;

  function __construct($username,$secretkey,$appid) {
    $this->user_name = $username;
    $this->secret_key = $secretkey;
    $this->app_id = $appid;
    $this->login();
  }

  function set_user_name($username) {
    $this->user_name = $username;
  }
  function get_user_name() {
    return $this->user_name;
  }

  function set_secret_key($secretkey){
    $this->secret_key=$secretkey;
  }
  function get_secret_key(){
    return $this->secret_key;
  }

  function set_access_token($accestoken){
    $this->access_token=$accestoken;
  }
  function get_access_token(){
    return $this->access_token;
  }

  function set_app_id($appid){
    $this->app_id=$appid;
  }
  function get_app_id(){
    return $this->app_id;
  }
  /**
     * This is used to login to the system and generate access token
     *
     *
     * @return access token of the user
     *
     */
  function login(){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,'http://things.epsumlabs.com/api/world/user/login?app_id='.$this->app_id);
    curl_setopt($curl,CURLOPT_HTTPHEADER,array('user:'.$this->user_name,'secret:'.$this->secret_key));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result=json_decode(curl_exec($curl), TRUE);
    //curl_close($curl);
    $this->access_token=$result['access_token'];
    return $this->access_token;
  }
}
?>
