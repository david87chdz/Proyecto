<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerFbWJnis\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerFbWJnis/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerFbWJnis.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerFbWJnis\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerFbWJnis\App_KernelDevDebugContainer([
    'container.build_hash' => 'FbWJnis',
    'container.build_id' => '9de0c991',
    'container.build_time' => 1708729021,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerFbWJnis');
