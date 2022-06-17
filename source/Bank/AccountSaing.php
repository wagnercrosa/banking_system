<?php

namespace Source\Bank;

use Source\App\Client;

class AccountSaing extends Account
{
    private $interest;

    protected function __construct($branch, $account, Client $client, $balance)
    {
        parent::__construct($branch, $account, $client, $balance);
        $this->interest = 0.006;
    }

    public function deposit($value)
    {
        // TODO: Implement deposit() method.

        %
    }

    public function withdrawal($value)
    {
        // TODO: Implement withdrawal() method.
    }

}