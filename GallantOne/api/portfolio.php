<?php


class PortfolioAPI 
{
    /* API request file */

    protected $ch;  // curl handle

    /* Use this later */
    public function __construct() 
    {
        //$ch = $this->initCurl();
    }

    /**
     * Get all Portfolio index
     */
    public function getAllPortfolio() 
    {
    
       $url = "http://api.gallantone.com/portfolio";
       return $this->goCurl($url);

    }


    /**
     * Get one.
     */
    public function getPortfolio($id) 
    {
       $url = "http://api.gallantone.com/portfolio/"+$id;
       return $this->goCurl($url);
    }

    /**
     * Curl setup
     */
    private function goCurl($url) 
    {
        // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, $url); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSLVERSION, 3);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        // $output contains the output string 
        $output = curl_exec($ch); 
        // close curl resource to free up system resources 
        curl_close($ch);
        return $output;
    }

}


$port = new PortfolioAPI;

// if querystring is this...
echo $port->getAllPortfolio();
// else if
// else 
