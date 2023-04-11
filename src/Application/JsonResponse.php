<?php

namespace App\Application;

//TODO сдлеать нормальную реализацию этого класса и связать с Response
class JsonResponse extends Response
{
    // Encode <, >, ', &, and " characters in the JSON, making it also safe to be embedded into HTML.
    // 15 === JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT
    public const DEFAULT_ENCODING_OPTIONS = 15;

    protected int $encodingOptions = self::DEFAULT_ENCODING_OPTIONS;

    public function __construct(
        protected mixed $data = null,
        public int $statusCode = 200,
        public array $headers = [],
        public ?bool $json = false
    )
    {
        parent::__construct('', $statusCode, $headers);

        if ($json && !\is_string($data) && !is_numeric($data) && !\is_callable([$data, '__toString'])) {
            throw new \TypeError(sprintf('"%s": If $json is set to true, argument $data must be a string or object implementing __toString(), "%s" given.', __METHOD__, get_debug_type($data)));
        }

        $data ??= new \ArrayObject();

        $json ? $this->setJson($data) : $this->setData($data);
    }

    private function setJson(string $json): self
    {
        $this->data = $json;

//        header('Content-Type: application/json');
//        echo $this->data;
//        header(sprintf('HTTP/%s %s %s', $this->version, $this->statusCode, $this->statusText), true, $this->statusCode);
        return $this->update();
    }

    private function setData(mixed $data = []): self
    {
        try {
            $data = json_encode($data, $this->encodingOptions);
        } catch (\Exception $e) {
            if ('Exception' === $e::class && str_starts_with($e->getMessage(), 'Failed calling ')) {
                throw $e->getPrevious() ?: $e;
            }
            throw $e;
        }

        if (\JSON_THROW_ON_ERROR & $this->encodingOptions) {
            return $this->setJson($data);
        }

        if (\JSON_ERROR_NONE !== json_last_error()) {
            throw new \InvalidArgumentException(json_last_error_msg());
        }

        return $this->setJson($data);
    }

    protected function update(): static
    {
        $this->headers[] = 'Content-Type: application/json';

        return $this->setContent($this->data);
    }


}
