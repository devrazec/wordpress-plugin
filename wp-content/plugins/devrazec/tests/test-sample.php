<?php
use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase {
    public function testTrueIsTrue() {
        echo "Running testTrueIsTrue...\n";
        $this->assertTrue(true, 'Message: This should always pass.');
        $this->markTestIncomplete('This test is not finished yet.');
        $this->markTestSkipped('Skipping this test for now.'); 
    }
}