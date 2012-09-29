#! /usr/bin/php
<?php
/**
 * users generator
 *
 * PHP version
 *
 * @category Util
 * @package  Tools
 * @author   fmp245 <francisco.marcos@tic.alten.es>
 * @license  http://gpl GPLv3.0
 * @version  SVN: $ Revision: $
 * @date     $ Date: $
 * @link     default
 **/

declare(encoding='UTF-8');

include_once 'Autoloader.php';

Autoloader::init();

use Generator\Data as dataGen;
use Seeder\Alpha as alphaSeeder;
# r indicates root node to encapsulate data
# v set of variables, comma separated indicating the variables
#   the data has
# n number of records to generate and the set is going to has
# l landing path where is going to be stored the data
# default is the directory where the script was called
$options = getopt("r:v:n:l:");
//TODO: check every value is present in opts
$root = $options['r'];
$values = explode(',',$options['v']);
$num = $options['n'];
$landingPath = (isset($options['l']))?$options['l']:'.';
//TODO: check $landingPath has the proper write perms
$container[$root] = array();
$container['length'] = $num;
$seeder = new alphaSeeder;
$data = new dataGen($values,$seeder);
while($num > 0){
    --$num;
    array_push($container[$root],$data->feed());
}
$fileName = implode(DIRECTORY_SEPARATOR,array($landingPath,$root.".json"));
file_put_contents($fileName,json_encode($container));
