<?php

namespace Osoobe\Laravel\DlvrIt;


class MessageRoute {

    protected $_id;
    protected $_content;
    protected $_params = [];

    public function __construct(string $content) 
    {
        $this->_content = $content;
        $this->_id = config('dlvrit.default_route_or_queue_id');
    }

    /**
     * Set the Id for the route
     *
     * @param [type] $id
     * @return MessageRoute
     */
    public function id($id) {
        $this->_id = $id;
        return $this;
    }


    /**
     * Set params
     *
     * @param array $params
     * @return MessageRoute
     */
    public function params(array $params) {
        $this->_params = $params;
        return $this;
    }

    /**
     * Add new line and content to message
     *
     * @param string $str
     * @return MessageRoute
     */
    public function line(string $str) {
        $this->_content .= "\n$str";
        return $this;
    }

    /**
     * Get the route or queue id.
     *
     * @return string
     */
    public function getId() {
        return $this->_id;
    }

    /**
     * Get the message
     *
     * @return string
     */
    public function getMessage() {
        return $this->_content;
    }

    /**
     * Get params
     *
     * @return mixed
     */
    public function getParams() {
        return ( !empty($this->_params) )? $this->_params : [];
    }


}

?>