<?php

namespace framework;

class View extends Response
{
    public string $file;
    public array $data;

    public function __construct(string $file, array $data = [], int $code = 200) {
        $this->file = $file;
        $this->data = $data;

        $html = $this->render();

        parent::__construct(ResponseType::HTML, $html, $code);
    }

    public function render(): string {
        $file = file_get_contents('../views/' . $this->file);

        $file = str_replace("{{", "<?php", $file);
        $file = str_replace("}}", "?>", $file);

        $file = preg_replace("/@echo\(\s*(.+)\s*\)/", "<?php echo($1); ?>", $file);

        $file = preg_replace("/@if\(\s*(.+)\s*\)/", "<?php if($1): ?>", $file);
        $file = preg_replace("/@elseif\(\s*(.+)\s*\)/", "<?php else if($1): ?>", $file);
        $file = str_replace("@else", "<?php else: ?>", $file);
        $file = str_replace("@endif", "<?php endif; ?>", $file);

        $file = preg_replace("/@foreach\(\s*(.+)\s*\)/", "<?php foreach($1): ?>", $file);
        $file = str_replace("@endforeach", "<?php endforeach; ?>", $file);

        $file = preg_replace("/@require\(\s*(.+)\s*\)/", "<?php require('../views/' . $1); ?>", $file);

        ob_start();
        extract($this->data);

        eval('?>' . $file);

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}