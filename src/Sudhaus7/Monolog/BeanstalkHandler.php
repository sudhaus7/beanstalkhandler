<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 21.06.18
 * Time: 20:27
 */

namespace Sudhaus7\Monolog;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use Pheanstalk\Pheanstalk;

class BeanstalkHandler extends AbstractProcessingHandler{
    
    /**
     * @var \Pheanstalk\Pheanstalk
     */
    private $beanstalk;
    
    /**
     * @var string
     */
    private $tube;
    
    public function __construct(Pheanstalk $beanstalk, $tube, $level = Logger::DEBUG,$bubble = true)
    {
        parent::__construct($level, $bubble);
        
        $this->beanstalk = $beanstalk;
        $this->tube = $tube;
    }
    
    /**
     * @param array $record
     */
    protected function write(array $record, $tube = null) {
        $this->beanstalk->useTube($tube ? $tube : $this->tube)->put(json_encode($record));
    }
    
}
