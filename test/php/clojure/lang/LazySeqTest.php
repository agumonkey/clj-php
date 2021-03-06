<?php

namespace clojure\lang;

require_once 'src/php/bootstrap.php';

class LazySeqTest extends \PHPUnit_Framework_TestCase {

    private $fn, $seq;

    public $x;

    protected function setUp() {
        $self = $this;
        $this->x = 1;
        // lazy sequence returns 2..5
        $fn = null;
        $fn = function() use ( $self, $fn ) { 
            return $self->x <= 5 
                ? new Cons( ++$self->x, new LazySeq($fn) )
                : null; 
        };
        $this->seq = new LazySeq( $fn );
    }

    public function testLazySequenceDoesntEvaluateImmediately() {
        $this->assertEquals( 1, $this->x );
    }

    public function testFirstItemCanBeFetchedFromSequence() {
return $this->markTestIncomplete();
        $this->assertEquals( 2, $this->seq->first() );
    }

    public function testSizeOfSequenceCanBeRetreived() {
return $this->markTestIncomplete();
        $this->assertEquals( 4, $this->seq->count() );
    }

}

