<?php

function appendMethods($file, $methods) {
    if (!file_exists($file)) {
        echo "Missing: $file\n";
        return;
    }
    $content = file_get_contents($file);
    $methodsCode = '';
    foreach ($methods as $m) {
        if (strpos($content, 'function '.$m) === false) {
            $methodsCode .= "    public function {$m}() {\n        return response()->json([]);\n    }\n";
        }
    }
    
    if ($methodsCode !== '') {
        // Strip the last closing brace and replace it with our methods
        $content = rtrim($content);
        if (str_ends_with($content, '}')) {
            $content = substr($content, 0, -1);
            $content .= "\n" . $methodsCode . "}\n";
            file_put_contents($file, $content);
            echo "Added methods to $file\n";
        }
    }
}

appendMethods('app/Http/Controllers/Public/GuestEngagementController.php', ['settings', 'heroBanners', 'calendar', 'fypTopics', 'reactions', 'comments', 'postComment', 'siwesDocuments']);
appendMethods('app/Http/Controllers/Public/DepartmentController.php', ['index', 'hod', 'subDepartments', 'subDepartment']);
appendMethods('app/Http/Controllers/Public/StaffController.php', ['index', 'show']);
appendMethods('app/Http/Controllers/Public/ProgrammeController.php', ['index', 'show', 'courses', 'materials']);
appendMethods('app/Http/Controllers/Public/AssociationController.php', ['index', 'executives', 'gallery', 'news']);
appendMethods('app/Http/Controllers/Public/EventController.php', ['index', 'show']);
appendMethods('app/Http/Controllers/Public/NewsController.php', ['index', 'show']);
appendMethods('app/Http/Controllers/Public/ContactController.php', ['submit']);
appendMethods('app/Http/Controllers/Auth/AuthController.php', ['forgotPassword', 'login', 'logout', 'me', 'resetPassword']);
appendMethods('app/Http/Controllers/Admin/DepartmentController.php', ['index', 'getHod', 'updateHod', 'update']);
appendMethods('app/Http/Controllers/SuperAdmin/LogsController.php', ['index']);
appendMethods('app/Http/Controllers/SuperAdmin/SettingsController.php', ['index']);
appendMethods('app/Http/Controllers/SuperAdmin/UserController.php', ['index', 'store', 'show', 'update', 'destroy']);

echo "Done\n";
