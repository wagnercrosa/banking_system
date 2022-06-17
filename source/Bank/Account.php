<?php

namespace Source\Bank;

use Source\App\Client;
use Source\App\Message;

abstract class Account
{
    private $branch;
    private $account;
    private $client;
    private $balance;

    /**
     * @param $branch
     * @param $account
     * @param $client
     * @param $balance
     */
    public function __construct($branch, $account, Client $client, $balance)
    {
        $this->branch = $branch;
        $this->account = $account;
        $this->client = $client;
        $this->balance = $balance;
    }

    protected function extract()
    {
        $extract = ($this->balance >= 1 ? Message::ACCEPT : Message::ERROR);
        Message::show("Extrato - Saldo Atual: {$this->toBrl($this->balance)}", $extract);
    }

    private function toBrl($value)
    {
        return "R$ ". number_format($value, "2",",",".");
    }

    abstract public function deposit($value);

    abstract public function withdrawal($value);
}