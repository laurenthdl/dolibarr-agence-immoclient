<?php

declare(strict_types=1);

require_once __DIR__ . '/../../class/immoclienttype.class.php';

class ImmoClientTypeTest extends PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function moduleClassShouldHaveCorrectNumber(): void
    {
        $moduleFile = __DIR__ . '/../../core/modules/modImmoclient.class.php';
        $this->assertFileExists($moduleFile);
        $content = file_get_contents($moduleFile);
        $this->assertStringContainsString('numero = 700002', $content);
    }

    /**
     * @test
     */
    public function classShouldExist(): void
    {
        $this->assertTrue(class_exists('ImmoClientType'));
    }

    /**
     * @test
     */
    public function shouldHaveCorrectTableElement(): void
    {
        $reflection = new ReflectionClass('ImmoClientType');
        $prop = $reflection->getProperty('table_element');
        $this->assertEquals('llx_immo_client_type', $prop->getValue(new ImmoClientType((object)[])));
    }
}
