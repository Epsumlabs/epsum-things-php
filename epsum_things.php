<?php
/**
 *
 * @author Epsum Labs Private Limited
 * This SDK is distributed under MIT License, the copy of which can be found on : https://opensource.org/licenses/MIT
 *
 *
 * Copyright (c) 2018 Epsum Labs Private Limited
 *
 */
include("account.php");
class epsumthings {
  public $base_url="http://things.epsumlabs.com/api";
  /**
       * This function is used to Display EpsumThings Profile
       *
       * @param $user object of the Account class
       * @param $json optional parameter default = true
       *
       *
       * @return json/array if $json paramter is set true returns json string else array.
       *
       *
       */
  function user_profile($user,$json=true){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$this->base_url.'/world/user/profile?app_id='.$user->get_app_id());
    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Authorization:'.$user->get_user_name().";".$user->get_access_token()));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result=curl_exec($curl);
    if($json){
      return $result;
    }
    else {
      return json_decode($result);
    }
  }
  /**
       * This function is used to update user profile
       *
       * @param $user object of the Account class
       * @param $fields stores the fields which are to be updated
       * example:-phone,social
       * @param $parameter is json of the user profile to update example:-
       * {"phone": "8328857891"}
       * @param $json optional parameter default = true
       *
       *
       *
       * @return json/array if $json paramter is set true returns json string else array.
       */
  function update_profile($user,$fields,$parameter,$json=true){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$this->base_url.'/world/user/updateprofile?app_id='.$user->get_app_id().'&fields='.$fields);
    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Authorization:'.$user->get_user_name().";".$user->get_access_token()));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $parameter);
    $result=curl_exec($curl);
    if($json){
      return $result;
    }
    else {
      return json_decode($result);
    }
  }
  /**
       * This is used to get user configuration
       *
       * @param $user object of the Account class
       * @param $configure store the json of the Thing Configuration
       * example:-{"config":[0,1],"thingid":"thing1"}
       * @param $json optional parameter default = true
       *
       *
       *
       * @return json/array if $json paramter is set true returns json string else array.
       *
       */
  function configureThings($user, $configure,$json=true){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$this->base_url.'/world/thing/config?app_id='.$user->get_app_id());
    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Authorization:'.$user->get_user_name().";".$user->get_access_token()));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $configure);
    $result=curl_exec($curl);
    if($json){
      return $result;
    }
    else {
      return json_decode($result);
    }
  }
  /**
       * This is used to Update Password
       *
       * @param $user object of the Account class
       * @param $newpassword store the New Password
       * @param $json optional parameter default = true
       *
       *
       *
       * @return json/array if $json paramter is set true returns json string else array.
       *
       */
  function updatePassword($user, $newpassword,$json=true){
    $body=json_encode(array("password" => $newpassword));
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$this->base_url.'/world/updatepassword?app_id='.$user->get_app_id());
    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Authorization:'.$user->get_user_name().";".$user->get_access_token()));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
    $result=curl_exec($curl);
    if($json){
      return $result;
    }
    else {
      return json_decode($result);
    }
  }
  /**
       * This is used to send the OTP to the user
       *
       * @param $email stores the user email
       * @param $json optional parameter default = true
       *
       *
       *
       * @return json/array if $json paramter is set true returns json string else array.
       *
       */
  function forgotPasswordStep1($email,$json=true){
    $body=json_encode(array("email" => $email));
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$this->base_url.'/world/forgot1');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
    $result=curl_exec($curl);
    if($json){
      return $result;
    }
    else {
      return json_decode($result);
    }
  }
  /**
      * This is used to set new password
      *
      * @param $email stores the user email
      * @param $token stores the token
      * @param $newpassword stores the new password
      * @param $json optional parameter default = true
      *
      *
      *
      * @return json/array if $json paramter is set true returns json string else array.
      *
      *
      */
  function forgotPasswordStep2($email, $token, $newpassword,$json=true){
    $body=json_encode(array("email" => $email,"token"=>$token,"newpassword"=>$newpassword));
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$this->base_url.'/world/forgot2');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
    $result=curl_exec($curl);
    if($json){
      return $result;
    }
    else {
      return json_decode($result);
    }
  }
  /**
       * This is used to get the activity log of the user
       *
       * @param $user object of the Account Class
       * @param $json optional parameter default = true
       *
       *
       *
       * @return json/array if $json paramter is set true returns json string else array.
       *
       */
  function activity($user,$json=true){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$this->base_url.'/world/activity?app_id='.$user->get_app_id());
    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Authorization:'.$user->get_user_name().";".$user->get_access_token()));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result=curl_exec($curl);
    if($json){
      return $result;
    }
    else {
      return json_decode($result);
    }
  }
  /**
       * This is used to control Thing
       *
       * @param $user object of the Account Class
       * @param $thingid stores the thing id
       * @param $control stores the HashMap of the thing configuration
       * @param $json optional parameter default = true
       *
       *
       *
       * @return json/array if $json paramter is set true returns json string else array.
       *
       */
  function controlThing($user, $thingid, $control,$json=true){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$this->base_url.'/world/thing/rw/'.$thingid.'?app_id='.$user->get_app_id());
    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Authorization:'.$user->get_user_name().";".$user->get_access_token()));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $control);
    $result=curl_exec($curl);
    if($json){
      return $result;
    }
    else {
      return json_decode($result);
    }
  }
  /**
     * This is used to thing Details
     *
     * @param $user object of the Account Class
     * @param $thingid stores the thing id
     * @param $json optional parameter default = true
     *
     *
     *
     * @return json/array if $json paramter is set true returns json string else array.
     *
     */
  function thingDetails($user, $thingid,$json=true){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$this->base_url.'/world/thing/rw/'.$thingid.'?app_id='.$user->get_app_id());
    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Authorization:'.$user->get_user_name().";".$user->get_access_token()));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result=curl_exec($curl);
    if($json){
      return $result;
    }
    else {
      return json_decode($result);
    }
  }
}
 ?>
