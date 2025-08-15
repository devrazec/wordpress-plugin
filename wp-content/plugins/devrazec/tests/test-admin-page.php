<?php
use PHPUnit\Framework\TestCase;

class DevrazecAdminPageTest extends TestCase {
    

    public function test_plugin_loaded() {
        $this->assertTrue( function_exists( 'devrazec_add_admin_menu' ) );
    }

    public function test_default_settings() {
        $this->assertEmpty( get_option( 'devrazec_textbox' ) );
        $this->assertEmpty( get_option( 'devrazec_combobox' ) );
        $this->assertEmpty( get_option( 'devrazec_checkbox' ) );
    }

    public function test_admin_page_output() {
        ob_start();
        devrazec_admin_page();
        $output = ob_get_clean();

        $this->assertStringContainsString('Devrazec Settings', $output);
        $this->assertStringContainsString('<input type="text"', $output);
        $this->assertStringContainsString('<select', $output);
        $this->assertStringContainsString('type="checkbox"', $output);
    }
}