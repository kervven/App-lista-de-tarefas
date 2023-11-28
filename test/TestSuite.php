/<?php
use PHPUnit\Framework\TestSuite;

class AppTestSuite
{
    public static function suite()
    {
        $suite = new TestSuite('App Test Suite');

     
        $suite->addTestSuite(TarefaServiceTest::class);

       
        $suite->addTestSuite(NovaTarefaTest::class);

        $suite->addTestSuite(Conexao::class);

        return $suite;
    }
}
