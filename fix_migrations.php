<?php
function updateMigration($tableName, $schema) {
    $files = glob(__DIR__ . "/database/migrations/*_create_" . $tableName . "_table.php");
    if (empty($files)) return;
    $file = $files[0];
    $content = file_get_contents($file);
    $replacement = "Schema::create(\"$tableName\", function (Blueprint \$table) {\n$schema\n        });";
    $content = preg_replace("/Schema::create\(\x27.*?\x27, function \(Blueprint \\\$table\) \{(.*?)\}\);/s", $replacement, $content);
    file_put_contents($file, $content);
    echo "Updated $tableName\n";
}

$schemaUsers = "            \$table->id();\n            \$table->string(\"name\");\n            \$table->string(\"email\")->unique();\n            \$table->string(\"password\");\n            \$table->string(\"photo\")->nullable();\n            \$table->string(\"role\")->default(\"guest\");\n            \$table->boolean(\"is_active\")->default(true);\n            \$table->timestamp(\"last_login\")->nullable();\n            \$table->rememberToken();\n            \$table->timestamps();";
updateMigration("users", $schemaUsers);

updateMigration("site_settings", "            \$table->id();\n            \$table->string(\"key\")->unique();\n            \$table->text(\"value\")->nullable();\n            \$table->string(\"type\")->default(\"text\");\n            \$table->foreignId(\"updated_by\")->nullable()->constrained(\"users\")->nullOnDelete();\n            \$table->timestamps();");

updateMigration("departments", "            \$table->id();\n            \$table->string(\"name\");\n            \$table->text(\"short_description\")->nullable();\n            \$table->longText(\"full_description\")->nullable();\n            \$table->text(\"vision\")->nullable();\n            \$table->text(\"mission\")->nullable();\n            \$table->json(\"core_values\")->nullable();\n            \$table->boolean(\"is_active\")->default(true);\n            \$table->timestamps();");

updateMigration("sub_departments", "            \$table->id();\n            \$table->foreignId(\"department_id\")->constrained(\"departments\")->cascadeOnDelete();\n            \$table->string(\"name\");\n            \$table->string(\"slug\")->unique();\n            \$table->text(\"short_description\")->nullable();\n            \$table->longText(\"full_description\")->nullable();\n            \$table->text(\"vision\")->nullable();\n            \$table->text(\"mission\")->nullable();\n            \$table->boolean(\"is_active\")->default(true);\n            \$table->timestamps();");

updateMigration("hod_profiles", "            \$table->id();\n            \$table->foreignId(\"department_id\")->constrained(\"departments\")->cascadeOnDelete();\n            \$table->string(\"name\");\n            \$table->string(\"photo\")->nullable();\n            \$table->string(\"qualification\")->nullable();\n            \$table->string(\"email\")->nullable();\n            \$table->string(\"phone\")->nullable();\n            \$table->longText(\"welcome_message\")->nullable();\n            \$table->longText(\"bio\")->nullable();\n            \$table->timestamps();");

updateMigration("staff", "            \$table->id();\n            \$table->foreignId(\"department_id\")->constrained(\"departments\")->cascadeOnDelete();\n            \$table->foreignId(\"sub_department_id\")->nullable()->constrained(\"sub_departments\")->nullOnDelete();\n            \$table->string(\"name\");\n            \$table->string(\"slug\")->unique();\n            \$table->string(\"photo\")->nullable();\n            \$table->string(\"email\")->nullable();\n            \$table->string(\"phone\")->nullable();\n            \$table->string(\"qualification\")->nullable();\n            \$table->string(\"designation\")->nullable();\n            \$table->longText(\"bio\")->nullable();\n            \$table->boolean(\"is_hod\")->default(false);\n            \$table->boolean(\"is_active\")->default(true);\n            \$table->integer(\"order_position\")->default(0);\n            \$table->timestamps();");

