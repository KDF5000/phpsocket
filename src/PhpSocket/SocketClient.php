<?php
namespace PhpSocket;

/**
 * Class SocketClient
 */
class SocketClient{
    /**
     * @var
     */
    private $socket;
    /**
     * @var string
     */
    private $address;
    /**
     * @var int
     */
    private $port;

    /**
     * @param string $address
     * @param int $port
     */
    public function __construct($address='127.0.0.1',$port=2003){
        $this->address = $address;
        $this->port = $port;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param int $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return bool
     */
    public function initSocket(){
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if($this->socket === false){
            return false;
        }
        return true;
    }

    /**
     * @return bool
     */

    public function connect(){
        if($this->socket == null){
            return false;
        }
        $result = socket_connect($this->socket, $this->address, $this->port);
        if ($result === false) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $msg
     * @return bool
     */
    public function send($msg){
        if($this->socket == null){
            return false;
        }
        socket_write($this->socket, $msg, strlen($msg));
        return true;
    }

    /**
     * 关闭socket
     */
    public function close(){
        if($this->socket != null){
            socket_close($this->socket);
        }
    }
}