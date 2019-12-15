<?php

class  A {
    protected $color = 'white';
    protected $form = 'round';
    protected $size = 'big';
}
trait B {
    protected $age = '25';
}
class Child extends A
{
    use B;
}
var_dump(new Child());