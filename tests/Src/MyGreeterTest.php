<?php

use PHPUnit\Framework\TestCase;
use Src\MyGreeter;

class MyGreeterTest extends TestCase
{
    private MyGreeter $greeter;

    public function setUp(): void
    {
        $this->greeter = new MyGreeter();
    }

    public function test_init()
    {
        $this->assertInstanceOf(
            MyGreeter::class,
            $this->greeter
        );
    }

    /**
     * 定义一些测试数据
     * @return array[]
     */
    public static function additionProvider()
    {
        return [
            [6, "Good morning"],      // 6AM
            [13, "Good afternoon"],   // 13PM
            [20, "Good evening"],     // 20PM
            // 定义一个错误的时间
            [8, "Good afternoon"],  // 早上8点正确的输出应该为Good morning，定义了一个错误的输出afternoon，测试*不通过*时，则代码没问题，反之代码有问题
        ];
    }

    /**
     * @dataProvider additionProvider
     * 通过dataProvider注解传入测试验证时间和返回的问候语是否一致，从而反推代码是否通过
     */
    public function test_greeting($time, $string)
    {
        // 验证问候语
        $this->assertEquals($string, $this->greeter->greeting($time), "当前小时与返回问候语不一致: $time");
    }

}
