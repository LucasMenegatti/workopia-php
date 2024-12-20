<?php

/**
 * Get the base path
 * 
 * @param string $path
 * @return string
 */
function basePath($path = '') {
    return __DIR__ . '/' . $path;
}

/**
 * Load a view
 * 
 * @param string $name
 * @return void
 */
function loadView($name, $data = []) {
    $viewPath = basePath("App/views/{$name}.view.php");
    if(file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View '{$viewPath}' not found!!!";
    }
}

/**
 * Load a partial
 * 
 * @param string $name
 * @return void
 */
function loadPartial($name, $data = []) {
    $partialPath = basePath("App/views/partials/{$name}.php");
    if(file_exists($partialPath)) {
        extract($data);
        require $partialPath;
    } else {
        echo "Partial '{$partialPath}' not found!!!";
    }
}

/**
 * Inspect a value(s)
 * 
 * @param string $value
 * @return void
 */
function inspect($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

/**
 * Inspect a value(s) and die
 * 
 * @param string $value
 * @return void
 */
function inspectAndDie($value) {
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}

/**
 * Format Salary
 */
function formatSalary(string $salary): string {
    return '$' . number_format(floatval($salary));
}

function sanitize(string $dirty): string
{
    return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS);
}

function redirect(string $url): void
{
    header("Location: {$url}");
    exit;
}