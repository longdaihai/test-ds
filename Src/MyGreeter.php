<?php

namespace Src;

class MyGreeter
{
    /**
     * 当前小时
     * @var int
     */
    private int $_hours;

    // 构造方法
    public function __construct()
    {
        // 初始化，获取当前小时（24小时制）
        $this->_hours =  (int)date('H');
        echo $this->_hours;
    }

    /**
     * 基于当前时间,返回一个问候消息
     * 逻辑：获取当前时间小时，判断时间在哪个区间段，则返回相应的问候语。
     * @return string 问候语
     */
    public function greeting(int $hours = null):string
    {
        // 是否传入变量
        if ($hours !== null) $this->_hours = $hours;

        // 根据小时判断并返回相应的问候语
        return match (true) {
            $this->_hours >= 6 && $this->_hours < 12 => "Good morning",
            $this->_hours >= 12 && $this->_hours < 18 => "Good afternoon",
            default => "Good evening",
        };
    }
}

// 实例化类
$greeter = new MyGreeter();
// 调用方法完成输出
echo $greeter->greeting();