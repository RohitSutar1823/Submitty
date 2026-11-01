<?php

namespace tests\app\views\submission;

use app\views\submission\HomeworkView;
use ReflectionMethod;

class HomeworkViewTester extends \PHPUnit\Framework\TestCase {
    public function testInvalidConfidenceDataFallsBackToNumericId(): void {
        $method = new ReflectionMethod(HomeworkView::class, 'removeLowConfidenceDigits');
        $method->setAccessible(true);

        $this->assertSame('1234', $method->invoke(null, null, '1234'));
        $this->assertSame('1234', $method->invoke(null, [0.9, 0.8], '1234'));
        $this->assertSame('1_34', $method->invoke(null, [0.9, 0.2, 0.8, 0.9], '1234'));
    }
}
