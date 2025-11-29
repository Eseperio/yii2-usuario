<?php

use Da\User\Module;

/**
 * Testing for the Module class.
 */
class ModuleTest extends \Codeception\Test\Unit
{
    /**
     * Test getEffectiveViewPath with default uiFramework (bootstrap5)
     */
    public function testDefaultUiFramework()
    {
        $module = new Module('user');
        
        $this->assertEquals(Module::UI_BOOTSTRAP5, $module->uiFramework);
        $this->assertNull($module->customViewPath);
        $this->assertEquals('@Da/User/resources/views/bootstrap5', $module->getEffectiveViewPath());
    }

    /**
     * Test getEffectiveViewPath with bootstrap3 uiFramework
     */
    public function testBootstrap3UiFramework()
    {
        $module = new Module('user');
        $module->uiFramework = Module::UI_BOOTSTRAP3;
        
        $this->assertEquals('@Da/User/resources/views/bootstrap3', $module->getEffectiveViewPath());
    }

    /**
     * Test that custom view path overrides uiFramework
     */
    public function testCustomViewPathOverridesUiFramework()
    {
        $module = new Module('user');
        $module->uiFramework = Module::UI_BOOTSTRAP5;
        $module->customViewPath = '@app/views/user';
        
        $this->assertEquals('@app/views/user', $module->getEffectiveViewPath());
    }

    /**
     * Test mailViewPath is independent of uiFramework
     */
    public function testMailViewPathIsIndependent()
    {
        $module = new Module('user');
        
        // Mail view path should always be the same regardless of uiFramework
        $this->assertEquals('@Da/User/resources/views/mail', $module->mailViewPath);
        
        $module->uiFramework = Module::UI_BOOTSTRAP3;
        $this->assertEquals('@Da/User/resources/views/mail', $module->mailViewPath);
    }

    /**
     * Test UI Framework constants are defined correctly
     */
    public function testUiFrameworkConstants()
    {
        $this->assertEquals('bootstrap3', Module::UI_BOOTSTRAP3);
        $this->assertEquals('bootstrap5', Module::UI_BOOTSTRAP5);
    }
}
