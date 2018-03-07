<?php
/**
 *
 * @author Epsum Labs Private Limited
 */
include("account.php");
class epsumthings {
  public $base_url="http://things.epsumlabs.com/api";
  //public $base_url="http://localhost:8008/api";
  /**
       * This function is used to Display EpsumThings Profile
       *
       * @param user object of the Account class
       * @return json object of the user profile details
       *
       *
       */
  function user_profile($user){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$this->base_url.'/world/user/profile?app_id='.$user->get_app_id());
    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Authorization:'.$user->get_user_name().";".$user->get_access_token()));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result=curl_exec($curl);
    return $result;
  }
  /**
       * This function is used to update user profile
       *
       * @param user object of the Account class
       * @param fields stores the fields which are to be updated
       * example:-phone,social
       * @param parameter is json of the user profile to update example:-
       * {"phone": "8328857891"}
       *
       *
       *
       * @return json object of the request
       */
  function update_profile($user,$fields,$parameter){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$this->base_url.'/world/user/updateprofile?app_id='.$user->get_app_id().'&fields='.$fields);
    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Authorization:'.$user->get_user_name().";".$user->get_access_token()));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $parameter);
    $result=curl_exec($curl);
    return $result;
  }
  /**
       * This is used to get user configuration
       *
       * @param user object of the Account class
       * @param configure store the json of the Thing Configuration
       * example:-{"config":[0,1],"thingid":"thing1"}
       *
       * @return json object of the request
       *
       */
  function configureThings($user, $configure){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$this->base_url.'/world/thing/config?app_id='.$user->get_app_id());
    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Authorization:'.$user->get_user_name().";".$user->get_access_token()));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $configure);
    $result=curl_exec($curl);
    return $result;
  }
  /**
       * This is used to Update Password
       *
       * @param user object of the Account class
       * @param newpassword store the New Password
       *
       * @return json object of the request
       *
       */
  function updatePassword($user, $newpassword){
    $body=json_encode(array("password" => $newpassword));
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$this->base_url.'/world/updatepassword?app_id='.$user->get_app_id());
    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Authorization:'.$user->get_user_name().";".$user->get_access_token()));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
    $result=curl_exec($curl);
    return $result;
  }
  /**
       * This is used to send the OTP to the user
       *
       * @param email stores the user email
       *
       * @return json object of the request
       *
       */
  function forgotPasswordStep1($email){
    $body=json_encode(array("email" => $email));
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$this->base_url.'/world/forgot1');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
    $result=curl_exec($curl);
    return $result;
  }
  /**
      * This is used to set new password
      *
      * @param email stores the user email
      * @param token stores the token
      * @param newpassword stores the new password
      *
      * @return json object of the request
      *
      *
      */
  function forgotPasswordStep2($email, $token, $newpassword){
    $body=json_encode(array("email" => $email,"token"=>$token,"newpassword"=>$newpassword));
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$this->base_url.'/world/forgot2');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
    $result=curl_exec($curl);
    return $result;
  }
  /**
       * This is used to get the activity log of the user
       *
       * @param user object of the Account Class
       *
       * @return json object of the request
       *
       */
  function activity($user){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$this->base_url.'/world/activity?app_id='.$user->get_app_id());
    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Authorization:'.$user->get_user_name().";".$user->get_access_token()));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result=curl_exec($curl);
    return $result;
  }
  /**
       * This is used to control Thing
       *
       * @param user object of the Account Class
       * @param thingid stores the thing id
       * @param control stores the HashMap of the thing configuration
       *
       * @return json object of the request
       *
       */
  function controlThing($user, $thingid, $control){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$this->base_url.'/world/thing/rw/'.$thingid.'?app_id='.$user->get_app_id());
    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Authorization:'.$user->get_user_name().";".$user->get_access_token()));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $control);
    $result=curl_exec($curl);
    return $result;
  }
  /**
     * This is used to thing Details
     *
     * @param user object of the Account Class
     * @param thingid stores the thing id
     *
     * @return json object of the request
     *
     */
  function thingDetails($user, $thingid){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$this->base_url.'/world/thing/rw/'.$thingid.'?app_id='.$user->get_app_id());
    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Authorization:'.$user->get_user_name().";".$user->get_access_token()));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result=curl_exec($curl);
    return $result;
  }
}
 ?>
