<?php

namespace app\models;

use kadcore\tcphpmvc\Model;

class ContactForm extends Model
{
    public function __construct(
        public string $email = '',
        public string $assunto = '',
        public string $mensagem = ''
    ) 
    { 
        

    }

    public function rules(): array 
    { 
        
        return array (
            'email' => [self::RULE_REQUIRED],
            'assunto' => [self::RULE_REQUIRED],
            'mensagem' => [self::RULE_REQUIRED],
        );

    }

    
}
