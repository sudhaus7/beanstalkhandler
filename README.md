# beanstalkhandler
A Monolog Handler to push logs to a Beanstalk instance


Usage

```
// Get a Beanstalk Connection
$beanstalk = new \Pheanstalk\Pheanstalk('127.0.0.1');

// Create a the Handler
$handler = new \Sudhaus7\Monolog\BeanstalkHandler($beanstalk,'logtube');

// Create a Logger
$logger = new \Monolog\Logger('debug');
$logger->pushHandler($handler);

// Log some data
$logger->debug('I am debug', array('productId' => 123));

```
This is a fast and nonblocking way to log data. Just do not forget to get the data out of beanstalk later.
This is very convinient
