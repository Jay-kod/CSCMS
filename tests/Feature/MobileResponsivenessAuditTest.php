<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\File;
use Tests\TestCase;

class MobileResponsivenessAuditTest extends TestCase
{
    /**
     * Audit Vue frontend files to verify they contain responsive Tailwind CSS breakpoints.
     * This ensures the UI is built 'mobile-first' and scales up correctly.
     */
    public function test_vue_components_contain_tailwind_responsive_classes(): void
    {
        $directory = resource_path('js');
        
        if (!File::exists($directory)) {
            $this->markTestSkipped('The resources/js directory does not exist.');
        }

        $vueFiles = File::allFiles($directory);
        
        $responsiveClassesFound = 0;
        $filesChecked = 0;

        foreach ($vueFiles as $file) {
            if ($file->getExtension() === 'vue') {
                $filesChecked++;
                $content = $file->getContents();

                // Check for Tailwind's responsive prefixes
                if (preg_match('/(?:sm:|md:|lg:|xl:|2xl:)/', $content)) {
                    $responsiveClassesFound++;
                }
            }
        }

        // We expect at least some Vue files (e.g. layouts/pages) to have responsive breakpoints.
        $this->assertGreaterThan(0, $filesChecked, 'No Vue components found to scan.');
        
        // As a baseline, at least 1 file should contain responsive styling in a mobile-responsive app.
        // We will assert that at least one responsive class was found across the project.
        $this->assertGreaterThan(
            0, 
            $responsiveClassesFound, 
            "Mobile responsiveness audit failed. No Tailwind responsive prefixes (sm:, md:, lg:) found in the Vue components."
        );
    }
}
