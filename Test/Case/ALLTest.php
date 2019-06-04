<?php
class ALLTest extends CakeTestSuite {

    public static function suite() {
        $suite = new CakeTestSuite(utf8_encode('TODOS OS TESTES UNITÁRIOS:'));
        $suite->addTestDirectoryRecursive(TESTS . 'Case');
        
        return $suite;
    }
}
?>