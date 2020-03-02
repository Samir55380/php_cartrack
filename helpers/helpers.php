<?php

    class Helpers {
        
        public function response_json($http_code, $message_title, $message_content){
            /*
            *   This function aims to return a json object with http-code, message key and message content
            */
            http_response_code($http_code);
            return json_encode(array($message_title => $message_content));
        }



    }