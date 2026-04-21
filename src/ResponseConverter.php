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
        $statusCode = $response->getStatusCode();
        $content = $response->getBody()->getContents();

        /**
         * @var array{
         *     items: array<string, mixed>,
         * } $response
         */
        $response = json_decode($content, true);

        if (200 !== $statusCode) {
            throw new \RuntimeException($response['message'] ?? 'Server returned an error: '.$statusCode);
        }

        // 422
        // "{"email":"Contractor already in team"}"

        $response = $response['items'] ?? $response;

        return $this->serializer->normalize($response, $type);
    }
}
