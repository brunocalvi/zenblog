<?php

class Message {
    public $msg;
    
    public function setMessage($msg) {
        $_SESSION['msg'] = $msg;
    }

    public function getMessage() {
        return  $_SESSION['msg'];
      }

    public function clearMessage() {
        return $_SESSION['msg'] = '';
    }
        
}