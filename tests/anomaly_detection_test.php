<?php

require_once dirname(__FILE__) . '/../lib/parametric/anomaly_detection.php';

/**
 * Test class for LL_AnomalyDetection.
 * Generated by PHPUnit on 2011-12-22 at 09:20:30.
 */
class LL_AnomalyDetectionTest extends PHPUnit_Framework_TestCase {
   /**
    * @covers LL_AnomalyDetection::isAnomaly()
    */
   public function testIsAnomaly() {
      $ad = new LL_AnomalyDetection();
      $ad->learn(array(array(1,2), array(2, 1), array(0,1), array(3, 1), array(-1,1)));
      $this->assertTrue($ad->isAnomaly(array(100, 40)));
      $this->assertTrue($ad->isAnomaly(array(-3, 2)));

      $this->assertFalse($ad->isAnomaly(array(1, 2)));
      $this->assertFalse($ad->isAnomaly(array(1.1, 2.1)));
      $this->assertFalse($ad->isAnomaly(array(0, 2.1)));
      $this->assertFalse($ad->isAnomaly(array(0, 2)));

      $value = $ad->isAnomaly(array(1,1), false);
      $this->assertTrue($value > 0 && $value < 0.5);
   }

}

?>