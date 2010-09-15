<?php

require_once('PEAR/PackageFileManager2.php');

PEAR::setErrorHandling(PEAR_ERROR_DIE);

$packagexml = new PEAR_PackageFileManager2;

$packagexml->setOptions(array(
    'baseinstalldir'    => '/',
    'simpleoutput'      => true,
    'packagedirectory'  => './',
    'filelistgenerator' => 'file',
    'ignore'            => array('runTests.php', 'generatePackage.php'),
    'dir_roles' => array(
        'tests'         => 'test',
        'documentation' => 'doc'
    ),
));

$packagexml->setPackage('ZendX');
$packagexml->setSummary('Zend Framework Xtras');
$packagexml->setDescription(
    'This is a set of libraries outside of ZendFramework, in the ZendX '
    . 'namespace.  Includes ZendX_JQuery'
);

$packagexml->setChannel('pear.php.net');
$packagexml->setAPIVersion('0.1.0');
$packagexml->setReleaseVersion('0.1.0');

$packagexml->setReleaseStability('alpha');

$packagexml->setAPIStability('alpha');

$packagexml->setNotes('* Initial release');
$packagexml->setPackageType('php');
$packagexml->addRelease();

$packagexml->detectDependencies();

$packagexml->addMaintainer('lead',
                           'shupp',
                           'Bill Shupp',
                           'shupp@php.net');

$packagexml->setLicense('New BSD License',
                        'http://www.opensource.org/licenses/bsd-license.php');

$packagexml->setPhpDep('5.1.2');
$packagexml->setPearinstallerDep('1.4.0b1');
$packagexml->addPackageDepWithChannel('required', 'Zend', 'zend.googlecode.com/svn', '1.10.7');
$packagexml->addExtensionDep('required', 'date');
$packagexml->addExtensionDep('required', 'pcre');

$packagexml->generateContents();
$packagexml->writePackageFile();

?>
