<?php

namespace GustavoSantarosa\DataSession;

 /**
 * Classe designada a armazenar as sessões
 * 
 * @package DataSession
 * @author Luis Gustavo Santarosa Pinto
 * @version 1.0
 * 
 * Diretório Pai - lib
 * Arquivo - DataSession.php
 */
class DataSession
{
    protected $session;
    protected $id;

    public function __construct(string $id)
    {
        $this->id = $id;
        session_id($id);
        session_start([
            'use_cookies' => false,
            'use_only_cookies' => true
        ]);
        $this->session = $_SESSION;
    }

    public function set(string $name, $value): void
    {
        $this->session[$name] = $value;
    }

    public function get(string $name)
    {
        return $this->session[$name] ?? null;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function unset(string $name): void
    {
        unset($this->session[$name]);
    }

    public function save(): void
    {
        $_SESSION = $this->session;
        session_write_close();
    }
}
?>