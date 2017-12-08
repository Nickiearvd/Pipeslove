<?php

namespace FLAppLite\Foundation;

if (!defined('ABSPATH')) { exit; }

class Request
{
    /**
     *  User Agent string to send to the server.
     *
     *  @const string
     */
    const USER_AGENT = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.81 Safari/537.36';

    /**
     *  Make a GET request to the given URL.
     *
     *  @param string   $url    The URL from which we request data.
     *
     *  @return array   Returns an array of data.
     */
    public function get($url)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_USERAGENT, self::USER_AGENT);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 0);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);

        curl_setopt($curl, CURLOPT_AUTOREFERER, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_VERBOSE, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

        $result = curl_exec($curl);
        $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $error = curl_error($curl);

        curl_close($curl);

        return $this->build_response($result, $error, $url, $status_code);
    }

    /**
     *  Make a POST request to the given URL.
     *
     *  @param string   $url    The URL from which we request data.
     *  @param array    $data   Data to send with request.
     *
     *  @return array   Returns an array of data.
     */
    public function post($url, $data)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_USERAGENT, self::USER_AGENT);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_FAILONERROR, false);

        curl_setopt($curl, CURLOPT_AUTOREFERER, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_VERBOSE, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

        $result = curl_exec($curl);
        $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $error = curl_error($curl);

        curl_close($curl);

        return $this->build_response($result, $error, $url, $status_code);
    }

    /**
     *  Build a response object.
     *
     *  @param  mixed   $result         The result on success, false on failure.
     *  @param  string  $error          The error returned by curl_error.
     *  @param  string  $url            The URL called.
     *  @param  number  $status_code    The status code returned by the server.
     *
     *  @return stdClass An object with all the values from passed params.
     */
    private function build_response($result, $error, $url, $status_code)
    {
        $response = new \stdClass;

        $response->result       = $result;
        $response->error        = $error;
        $response->url          = $url;
        $response->status_code  = $status_code;

        return $response;
    }
}
