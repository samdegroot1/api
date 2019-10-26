<?php

namespace Util;

class Curl
{
    const TYPE_POST = 'post';
    const TYPE_GET = 'get';
    const TYPE_PUT = 'put';

    private $request;
    private $headers;

    public static function getInstance($url)
    {
        return new self($url);
    }

    public function __construct($url)
    {
        $this->request = curl_init($url);
    }

    public function setRequestMethod($type)
    {
        switch ($type) {
            case self::TYPE_POST:
                curl_setopt($this->request, CURLOPT_PUT, 0);
                curl_setopt($this->request, CURLOPT_POST, 1);
                break;
            case self::TYPE_PUT:
                curl_setopt($this->request, CURLOPT_PUT, 1);
                curl_setopt($this->request, CURLOPT_POST, 0);
                break;

            case self::TYPE_GET:
                curl_setopt($this->request, CURLOPT_PUT, 0);
                curl_setopt($this->request, CURLOPT_POST, 0);
                break;
            default:
                throw new Exception(sprintf("Invalid request method '%s' provided", $type));
        }

        return $this;
    }

    /**
     * @param $name
     * @param $value
     *
     * @return $this
     */
    public function addHeader($name, $value)
    {
        $this->headers[$name] = "{$name}: {$value}";

        return $this;
    }

    public function setPostData($data)
    {
        $data = json_encode($data);
        curl_setopt($this->request, CURLOPT_POSTFIELDS, $data);

        return $this;
    }

    public function execute($returndata = true)
    {
        curl_setopt($this->request, CURLOPT_HTTPHEADER, $this->headers);

        if($returndata) {
            curl_setopt($this->request, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($this->request, CURLINFO_HEADER_OUT, 1);
        }

        return $this->makeRequest();
    }

    public function getRequestInfo()
    {
        return curl_getinfo($this->request);
    }

    public function close()
    {
        curl_close($this->request);
    }

    private function makeRequest($closeConnection = true)
    {
        $data = curl_exec($this->request);

        if($closeConnection) {
            $this->close();
        }

        return $data;
    }
}