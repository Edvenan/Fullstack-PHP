<?php

        class Account{
        // Class attributes
        public static $num_compte = 1;
        private $compte;
        private $nom;
        private $cognoms;
        private $saldo;

        // Constructor function
        public function __construct($nom, $cognoms){

                $this->compte = self::$num_compte;
                self::$num_compte += 1;
                $this->nom = $nom;
                $this->cognoms = $cognoms;
                $this->saldo = 0.0;
        }

        // Deposit function
        public function deposit($amount){
                $this->saldo += $amount;
        }

        // withdraw function
        public function withdraw($amount){
                if ($amount <= $this->saldo){
                $this->saldo -= $amount;
                }
                else{
                echo "Error. La quantitat a retirar és superior al saldo existent.<br>";
                }
        }

        // Getters & Setters
                
        public function getCompte()
        {
                return $this->compte;
        }

        public function setCompte($compte)
        {
                $this->compte = $compte;

                return $this;
        }

        public function getNom()
        {
                return $this->nom;
        }

        public function setNom($nom)
        {
                $this->nom = $nom;

                return $this;
        }

        public function getCognoms()
        {
                return $this->cognoms;
        }

        public function setCognoms($cognoms)
        {
                $this->cognoms = $cognoms;

                return $this;
        }

        public function getSaldo()
        {
                return $this->saldo;
        }

        public function setSaldo($saldo)
        {
                $this->saldo += $saldo;

                return $this;
        }
        }
?>