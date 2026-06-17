<?php
$models = glob('app/Models/*.php');
foreach ($models as $m) {
    $content = file_get_contents($m);
    if (!str_contains($content, 'guarded')) {
        $content = str_replace('use HasFactory;', "use HasFactory;\n    protected \$guarded = [];", $content);
        file_put_contents($m, $content);
    }
}
echo "Models updated.\n";
