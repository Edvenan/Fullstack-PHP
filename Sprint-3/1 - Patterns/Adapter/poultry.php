<?php 

class Duck {

    public function quack() {
           echo "Quack \n";
    }

    public function fly() {
           echo "I'm flying \n";
    }
}

class Turkey {

    public function gobble() {
           echo "Gobble gobble \n";
    }

    public function fly() {
    echo "I'm flying a short distance \n";
    }
}

class TurkeyAdapter extends Turkey
{
    private $turkey;
        
    public function __construct(Turkey $turkey) {
        $this->turkey = $turkey;
    }

    public function quack()
    {
        return $this->turkey->gobble();
    }

    public function fly()
    {
        return [$this->turkey->fly(),
              $this->turkey->fly(),
              $this->turkey->fly(),
              $this->turkey->fly(),
              $this->turkey->fly()];
    }
}
?>