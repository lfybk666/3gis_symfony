<?php

namespace App\Application;

//TODO сдлеать нормальную реализацию этого класса и связать с JsonResponse

class Response
{

    public function __construct(
        protected ?string $content = '',
        protected int $statusCode = 200,
        protected array $headers = []
    )
    {
        $this->setContent($content);
        $this->setStatusCode($statusCode);
    }

    public function setStatusCode(int $code): static
    {
        http_response_code($code);

        return $this;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function send(): static
    {
        $this->sendHeaders();
        $this->sendContent();

        return $this;
    }

    private function sendHeaders(): static
    {
        foreach ($this->headers as $header) {
            header($header);
        }

        http_response_code($this->statusCode);

        return $this;
    }

    private function sendContent(): static
    {
        echo $this->content;

        return $this;
    }

}
