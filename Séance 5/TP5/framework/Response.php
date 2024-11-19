<?php

namespace framework;

/**
 * Represent an HTTP response
 */
class Response {
    public ResponseType $type;

    /**
     * HTTP response content
     *
     * @var string
     */
    public string $content;

    /**
     * HTTP response code
     *
     * @var int
     */
    public int $code = 200;

    /**
     * Creates a response
     *
     * @param ResponseType $type
     * @param string $content
     * @param int $code
     */
    function __construct(ResponseType $type, string $content, int $code = 200) {
        $this->type = $type;
        $this->content = $content;
        $this->code = $code;
    }
}