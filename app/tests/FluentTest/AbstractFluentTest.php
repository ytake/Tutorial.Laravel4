<?php
namespace App\Tests\FluentTest;

use App\Tests\TestCase;
use Mockery as m;

class AbstractFluentTest extends TestCase
{

    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
        $this->prepareForTests();
        $this->mock = m::mock(new ConcreteFluent());
    }

    /**
     * Property test
     */
    public function testFluentProperty()
    {
        $this->assertSame("user_id", $this->getProperty($this->mock, 'primary'));
        $this->assertSame("test_cache_key", $this->getProperty($this->mock, 'cacheKey'));
        $this->assertSame("users", $this->getProperty($this->mock, 'table'));
    }

    /**
     *
     */
    public function testAdd()
    {
        $this->assertInternalType('int',
            $this->mock->add([
                'user_name' => 'hello_testing',
                'remember_token' => 'token',
                'password' => 'password'
            ])
        );
    }

    public function testAll()
    {
        $records = $this->mock->all();
        $this->assertInternalType('array', $records);
        $this->assertInstanceOf('stdClass', $records[0]);
    }

    public function testFind()
    {
        $records = $this->mock->find(1);
        $this->assertInstanceOf('stdClass', $records);
        $this->assertObjectHasAttribute('user_id', $records);
        $this->assertSame("1", $records->user_id);
    }

    public function testDelete()
    {
        // true or false
        $this->assertSame(1, $this->mock->delete(1));
        $this->assertSame(null, $this->mock->find(1));
        $this->assertSame(0,  count($this->mock->all()));
    }

    /**
     * @param $object
     * @param $property
     * @return mixed
     */
    protected function getProperty($object, $property)
    {
        $reflector = new \ReflectionProperty(get_class($object), $property);
        $reflector->setAccessible(true);
        return $reflector->getValue($object);
    }
}


class ConcreteFluent extends \App\Repositories\Fluent\AbstractFluent
{
    protected $primary = "user_id";

    protected $cacheKey = "test_cache_key";

    protected $table = "users";
}