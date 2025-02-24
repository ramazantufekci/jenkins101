<?php
require_once __DIR__ . '/../src/Deneme.php';
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Drn\Deneme;
class DenemeTest extends TestCase
{
    public function testPrivateConstructor()
    {
        // Reflection kullanarak private constructor'ı açığa çıkar
        $reflection = new ReflectionClass(Deneme::class);
        $constructor = $reflection->getConstructor();
        
        // Constructor'ın private olup olmadığını test et
        $this->assertTrue($constructor->isPrivate(), "Constructor private olmalı");

        // Constructor'ı çağırarak nesne oluşturulabiliyor mu test et
        $constructor->setAccessible(true); // Private constructor'ı erişilebilir yap
        $instance = $reflection->newInstanceWithoutConstructor(); // Nesne oluştur

        $this->assertInstanceOf('Deneme', $instance, "Oluşturulan nesne deneme sınıfından olmalı");
    }
}
