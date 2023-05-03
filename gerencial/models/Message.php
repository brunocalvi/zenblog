<?php

class Message {
    public $msg;
    
    public function setMessage($value) {
        $this->msg = $value;
    }

    public function getMessage() {
        return   $this->msg;
      }

    public function clearMessage() {
        return  $this->msg = '';
    }

    public function alertMenssage($alert) {
        if ($alert <> null) {
            if (!strstr($alert,'sucesso')) {
                echo '<div class="alert alert-danger alert-aling-text text-center" role="alert">' . $alert .'</div>';

            } else {
                echo '<div class="alert alert-success alert-aling-text text-center" role="alert">' . $alert .'</div>';
            }
        }
    }
       
}
?>