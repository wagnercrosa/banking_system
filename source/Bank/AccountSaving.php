<?php

namespace Source\Bank;

use Source\App\Client;
use Source\App\Message;

class AccountSaving extends Account
{
    /**
     * @var float
     */
    private $interest;

    /**
     * @param $branch
     * @param $account
     * @param Client $client
     * @param $balance
     */
    public function __construct($branch, $account, Client $client, $balance)
    {
        parent::__construct($branch, $account, $client, $balance);
        $this->interest = 0.006;
    }

    /**
     * @param $value
     * @return void
     */
    public function deposit($value): void
    {
        $this->balance = $value + ($value * $this->interest);
        Message::show("Depósito de <strong>{$this->toBrl($this->balance)}</strong> realizado com sucesso!", Message::ACCEPT);
    }

    /**
     * @param $value
     * @return void
     */
    public function withdrawal($value): void
    {
        if($this->balance >= $value) {
            $this->balance -= abs($value);
            Message::show("Saque de <strong>{$this->toBrl($value)}</<strong> realizado com sucesso!", Message::ERROR);
        }else{
            Message::show("Saldo insuficientel, você tem <strong>{$this->toBrl($this->balance)}</strong>!", Message::WARNING);
        }
    }

}