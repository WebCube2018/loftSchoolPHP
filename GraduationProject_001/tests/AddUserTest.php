<?php
namespace tests\AddUserTest;

use PHPUnit\Framework\TestCase;

require_once "../src/login.php";
require_once "../src/function.php";

class AddUserTest extends TestCase
{
    public function testCheckTrue()
    {
        $model = addUser();
        $this->assertTrue($model->check());
    }
}
