<?php

$color = '';
$icon = '';

switch (strtolower($alerta['tipo'])) {

    case 'success':
        $color = 'bg-green-100 border-green-500 text-green-700';
        $icon = '✓';
        break;

    case 'warning':
        $color = 'bg-yellow-100 border-yellow-500 text-yellow-700';
        $icon = '⚠';
        break;

    case 'error':
        $color = 'bg-red-100 border-red-500 text-red-700';
        $icon = '✕';
        break;

    default:
        $color = 'bg-blue-100 border-blue-500 text-blue-700';
        $icon = 'ℹ';
}
?>

<div class="max-w-7xl mx-auto px-4 mt-6">
    <div class="border-l-4 p-4 rounded-lg shadow-md <?php echo $color; ?> flex items-center justify-between">

        <div class="flex items-center gap-3">
            <span class="text-lg font-bold"><?php echo $icon; ?></span>
            <span class="font-medium">
                <?php echo $alerta['mensaje']; ?>
            </span>
        </div>

        <button onclick="this.parentElement.remove()" 
                class="font-bold hover:opacity-70">
            ✖
        </button>

    </div>
</div>