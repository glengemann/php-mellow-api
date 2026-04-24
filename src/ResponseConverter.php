<?php

declare(strict_types=1);

namespace Mellow;

use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ResponseConverter
{
    private readonly Serializer $serializer;

    public function __construct()
    {
        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());
        $nameConverter = new MetadataAwareNameConverter($classMetadataFactory);

        $normalizers = [
            new ArrayDenormalizer(),
            new ObjectNormalizer($classMetadataFactory, $nameConverter),
        ];

        $this->serializer = $serializer ?? new Serializer($normalizers);
    }

    /**
     * @return array|object
     */
    public function convert(
        ResponseInterface $response,
        string $type,
    ) {
        $raw = $response->getBody()->getContents();

        /**
         * @var array{
         *     items: array<string, mixed>,
         *     email?: string,
         *     taskId?: string,
         *     error?: string,
         * } $payload
         */
        $payload = '' !== $raw
            ? json_decode($raw, true, 512, JSON_THROW_ON_ERROR)
            : [];

        $statusCode = $response->getStatusCode();
        if (200 < $statusCode || $statusCode >= 300) {
            $error = $payload['email'] ?? $payload['taskId'] ?? $payload['error'] ?? 'Unknown error';

            $message = sprintf('[%d] %s', $statusCode, $error);
            throw new \RuntimeException($message);
        }

        $payload = $payload['items'] ?? $payload;

        return $this->serializer->denormalize($payload, $type);
    }
}
