<?php

namespace Osoobe\Laravel\DlvrIt;


class MessageAccount extends MessageRoute {


    public function __construct(string $content) 
    {
        $this->content = $content;
        $this->id = config('dlvrit.default_account_id');
    }


}

?>