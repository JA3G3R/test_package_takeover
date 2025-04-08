<?php

namespace commonmark\cmark;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Script\Event;

class MyPlugin implements PluginInterface, EventSubscriberInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        // You can store references if needed
    }

    public static function getSubscribedEvents()
    {
        return [
            'post-install-cmd' => 'onPostInstall',
        ];
    }

    public function onPostInstall(Event $event)
    {
        file_put_contents('/tmp/composer_dependency_hook.txt', "✅ Installed your-vendor/your-package as a dependency\n");
    }
}

