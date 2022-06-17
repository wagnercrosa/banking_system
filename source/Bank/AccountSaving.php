<?php

namespace Source\Bank;

use Source\App\Client;
use Source\App\Message;

class AccountSaving extends Account
{
    private $interest;

    public function __construct($branch, $account, Client $client, $balance)
    {
        parent::__construct($branch, $account, $client, $balance);
        $this->interest = 0.006;
    }

    public function deposit($value)
    {
        // TODO: Implement deposit() method.
        $this->balance = $value + ($value * $this->interest);
        Message::show("Depósito de {$this->toBrl($this->balance)} realizado com sucesso!", Message::ACCEPT);
    }

    public function withdrawal($value)
    {
        // TODO: Implement withdrawal() method.

        if($this->balance >= $value) {
            $this->balance -= abs($value);
            Message::show("Saque de {$this->toBrl($value)} realizado com sucesso!", Message::ERROR);
        }else{
            Message::show("Saldo insuficientel, você tem {$this->toBrl($this->balance)}!", Message::WARNING);
        }
    }

}