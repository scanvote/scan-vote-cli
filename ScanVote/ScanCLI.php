<?php
namespace ScanVote;

use Leo108\ConsoleQrCode\Application;
use splitbrain\phpcli\CLI;
use splitbrain\phpcli\Options;
use Zend\Http\Client;

require 'vendor/autoload.php';



abstract class ScanCLI extends CLI
{

    abstract static function validate($string);

    // register options and arguments
    protected function setup(Options $options)
    {
        $options->setHelp('A very minimal example that does nothing but print a version');
        $options->registerOption('version', 'print version', 'v');
        $options->registerOption('text', 'QR text to encode', 't');
    }

    // implement your code
    protected function main(Options $options)
    {
        if ($options->getOpt('version')) {
            $this->info('1.0.0');
        } else if ($options->getOpt('text')) {
            //echo $options->help();	
	    $application = new Application('Console QRcode', '0.2');
	    $application->run();
	    $this->validate();
        }
    }
}
