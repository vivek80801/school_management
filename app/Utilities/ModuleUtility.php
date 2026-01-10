<?php

namespace App\Utilities;

use Nwidart\Modules\Facades\Module;

class ModuleUtility
{
    public function getModuleData(string $function, ?string $arguments = null): array
    {
        $data = [];
        $allModules = Module::collections();
        foreach ($allModules as $module) {
            $class = 'Modules\\'.$module->getName()."\Http\Controllers\DataController";
            if (class_exists($class)) {
                $classObject = new $class;
                if (method_exists($classObject, $function)) {
                    if (! empty($arguments)) {
                        $data[$module->getName()] = call_user_func([$classObject, $function], $arguments);
                    } else {
                        $data[$module->getName()] = call_user_func([$classObject, $function]);
                    }

                }
            }
        }

        return $data;
    }
}
