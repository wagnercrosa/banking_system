<?php

namespace Source\Bank;

use Source\App\Client;
use Source\App\Message;

class AccountCurrent extends Account
{
    private $limit;

    public function __construct($branch, $account, Client $client, $balance, $limit)
    {
        parent::__construct($branch, $account, $client, $balance);
        $this->limit = $limit;
    }

    /**
     * @param $value
     * @return void
     */
    public function deposit($value): void
    {
        $this->balance += $value;
        Message::show("Depósito de <strong>{$this->toBrl($value)}</strong> efetuado com sucesso.", Message::ACCEPT);
    }

    /**
     * @param $value
     * @return void
     */
    public function withdrawal($value): void
    {

       if($value <= $this->balance + $this->limit){
            $this->balance -= abs($value);
            Message::show("Saque de <strong>{$this->toBrl($value)}</strong> realizado com sucesso.", Message::ERROR);

            if($this->balance < 0){
                $tax = abs($this->balance) * 0.006;
                $this->balance -= $tax;
                Message::show("Taxa de uso de Limite: {$this->toBrl($tax)}", Message::WARNING);
            }
        }else{
            $realBalance = $this->balance + $this->limit;
            Message::show("Seu Saldo + Limite dispónivel é <strong>{$this->toBrl($realBalance)},</strong> impossivel  realizar saque..", Message::ERROR);
        }

    }
}