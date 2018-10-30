<?php
namespace App\Http\Services;
use Carbon\Carbon;
/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */

class Google
{
 public static function getClient()
 {
        session_start();
        $client = new \Google_Client();

        $client->setAuthConfig(storage_path('app/google-calendar/client_secret.json'));

        $client->setAccessType("offline");        // offline access
        $client->setIncludeGrantedScopes(true);   // incremental auth
        $client->addScope(\Google_Service_Calendar::CALENDAR);
        $carbon = Carbon::now();
        if($_SESSION["access_token_created"]->diffInSeconds($carbon) >= 3600){
            $_SESSION["access_token"] == null;
            Google::oauth2Callback();
        }
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
          $client->setAccessToken($_SESSION['access_token']);
          $calendar = new \Google_Service_Calendar($client);
          return $calendar;
      } else {

          Google::oauth2Callback();
      }

  }

  public static function oauth2Callback(){
        
        $client = new \Google_Client();
        $client->setAuthConfigFile(storage_path('app/google-calendar/client_secret.json'));
        $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/calendar');
        $client->addScope(\Google_Service_Calendar::CALENDAR);
        
        if (! isset($_GET['code'])) {
            $auth_url = $client->createAuthUrl();
            try {
                header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
            } catch (Exception $e) {
                echo $e;   
            }
            
            
        } else {
          $client->authenticate($_GET['code']);
          $_SESSION['access_token'] = $client->getAccessToken();
          $_SESSION["access_token_created"] = Carbon::now();
          $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/calendar';
          header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
      }
    }
}
