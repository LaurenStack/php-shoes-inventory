<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Brand.php";
    require_once "src/Store.php";


    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Brand::deleteAll();
            Store::deleteAll();
        }

        function test_save_and_getAll()
        {
            //Arrange
            $name = "Nike";
            $id = null;
            $new_store = new Store($name, $id);

            //Act
            $new_store->save();
            $result = Store::getAll();

            //Assert
            $this->assertEquals([$new_store], $result);
        }


    }

?>
