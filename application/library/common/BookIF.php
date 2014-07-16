<?php


interface BookIF {

    /**
    * Generates and returns the search request that needs to be
    * sent to the source.
    *
    * @return Request to be sent to vendor.
    */
    public function generateSourceRequest($params = null);
    
    /**
    * 
    *
    * @return connection url
    */
    public function getConnectionUrl();
    
    
    /**
    * Translates the response from the source.
    *
    * @return translated result
    */
    public function translateSourceResponse($response = null);
    

          
}


?>