<?php

namespace Osoobe\Laravel\DlvrIt;


class MessageRoute {

    protected $_id;
    protected $_cotnent;
    protected $_params = [];

    public function __construct(string $content) 
    {
        $this->_content = $content;
        $this->_id = config('dlvrit.default_route_or_queue_id');
    }

    public function id($id) {
        $this->_id = $id;
        return $this;
    }


    public function params(array $params) {
        $this->_params = $params;
        return $this;
    }

    public function getId() {
        return $this->_id;
    }

    public function getMessage() {
        return $this->_content;
    }

    public function getParams() {
        return ( !empty($this->_params) )? $this->_params : [];
    }


}

?>