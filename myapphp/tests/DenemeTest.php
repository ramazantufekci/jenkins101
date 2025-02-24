<?php

use PHPUnit\Framework\TestCase;
use ReflectionClass;
require_once __DIR__ . '/../src/deneme.php';
class DenemeTest extends TestCase
{
    public function testPrivateConstructor()
    {
         $this->assertTrue(false, "test".__DIR__."Constructor private olmalı");
        // Reflection kullanarak private constructor'ı açığa çıkar
        $reflection = new ReflectionClass('deneme');
        var_export($reflection);
        $this->assertTrue(false, $reflection);
        $constructor = $reflection->getConstructor();
        
        // Constructor'ın private olup olmadığını test et
        $this->assertTrue($constructor->isPrivate(), "Constructor private olmalı");

        // Constructor'ı çağırarak nesne oluşturulabiliyor mu test et
        $constructor->setAccessible(true); // Private constructor'ı erişilebilir yap
        $instance = $reflection->newInstanceWithoutConstructor(); // Nesne oluştur

        $this->assertInstanceOf('deneme', $instance, "Oluşturulan nesne deneme sınıfından olmalı");
    }
}
