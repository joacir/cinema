<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\JsHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\JsHelper Test Case
 */
class JsHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\JsHelper
     */
    protected $Js;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->Js = new JsHelper($view);
    }

    public function testBuffer(): void
    {
        $script = 'alert("hello world")';
        $this->Js->buffer($script);

        $buffer = $this->Js->getBuffer();

        $this->assertEquals([$script], $buffer);
    }
}
