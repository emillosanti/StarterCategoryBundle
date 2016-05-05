<?php
/*
 * This file WAS part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code for FOSUserBundle.
 */
if (!($loader = @include __DIR__ . '/../vendor/autoload.php')) {
    echo <<<EOT
You need to install the project dependencies using Composer:
$ wget http://getcomposer.org/composer.phar
OR
$ curl -s https://getcomposer.org/installer | php
$ php composer.phar install --dev
$ phpunit
EOT;
    echo PHP_EOL . PHP_EOL . __DIR__ . '/../vendor/autoload.php';
    exit(1);
}

\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');
