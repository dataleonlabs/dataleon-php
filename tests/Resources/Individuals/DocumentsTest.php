<?php

namespace Tests\Resources\Individuals;

use Dataleon\Client;
use Dataleon\Parameters\Individuals\DocumentUploadParams;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class DocumentsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('skipped: tests are disabled for the time being');
        }

        $result = $this->client->individuals->documents->list('individual_id');

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testUpload(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('skipped: tests are disabled for the time being');
        }

        $result = $this
            ->client
            ->individuals
            ->documents
            ->upload(
                'individual_id',
                DocumentUploadParams::new(
                    documentType: 'bank_statements'
                )
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testUploadWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('skipped: tests are disabled for the time being');
        }

        $result = $this
            ->client
            ->individuals
            ->documents
            ->upload(
                'individual_id',
                DocumentUploadParams::new(
                    documentType: 'bank_statements',
                    file: 'file',
                    url: 'https://example.com/sample.pdf',
                )
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }
}
