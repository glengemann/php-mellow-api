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

    public function convert(
        ResponseInterface $response,
        string $type,
    ): array {
        $response = $response->getBody()->getContents();
        $response = json_decode($response, true);

        return $this->serializer->normalize($response, $type);
    }
}
