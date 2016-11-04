<?php
use kartik\markdown\MarkdownEditor;

$this->title = '文章管理';

echo MarkdownEditor::widget([
    'model' => $model,
    'attribute' => 't',
]);

echo "<hr style='color:red'>";

echo MarkdownEditor::widget([
    'name' => 'markdown',
    'value' => $value,
]);
?>
