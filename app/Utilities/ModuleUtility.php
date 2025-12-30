<?php

namespace App\Utilities;

use Nwidart\Modules\Facades\Module;

class ModuleUtility
{
    public function getModuleData(string $function, ?string $arguments = null): array
    {
        // Modules\Student\Http\Controllers;
        $data = [];
        $all_modules = Module::collections();
        foreach ($all_modules as $module) {
            $class = 'Modules\\'.$module->getName()."\Http\Controllers\DataController";
            if (class_exists($class)) {
                $class_object = new $class;
                if (method_exists($class_object, $function)) {
                    if (! empty($arguments)) {
                        $data[$module->getName()] = call_user_func([$class_object, $function], $arguments);
                    } else {
                        $data[$module->getName()] = call_user_func([$class_object, $function]);
                    }

                }
            }
        }

        return $data;
    }
}
