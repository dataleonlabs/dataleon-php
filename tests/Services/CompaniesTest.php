<?php

namespace Tests\Services;

use Dataleon\Client;
use Dataleon\Companies\CompanyRegistration;
use Dataleon\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CompaniesTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->companies->create(
            company: ['name' => 'ACME Corp'],
            workspaceID: 'wk_123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CompanyRegistration::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->companies->create(
            company: [
                'name' => 'ACME Corp',
                'address' => '123 rue Exemple, Paris',
                'commercialName' => 'ACME',
                'country' => 'FR',
                'email' => 'info@acme.fr',
                'employerIdentificationNumber' => 'EIN123456',
                'legalForm' => 'SARL',
                'phoneNumber' => '+33 1 23 45 67 89',
                'registrationDate' => '2010-05-15',
                'registrationID' => 'RCS123456',
                'shareCapital' => '100000',
                'status' => 'active',
                'taxIdentificationNumber' => 'FR123456789',
                'type' => 'main',
                'websiteURL' => 'https://acme.fr',
            ],
            workspaceID: 'wk_123',
            sourceID: 'ID54410069066',
            technicalData: [
                'activeAmlSuspicions' => false,
                'callbackURL' => 'https://example.com/callback',
                'callbackURLNotification' => 'https://example.com/notify',
                'filteringScoreAmlSuspicions' => 0.75,
                'language' => 'fra',
                'portalSteps' => ['identity_verification', 'document_signing'],
                'rawData' => true,
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CompanyRegistration::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->companies->retrieve('company_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CompanyRegistration::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->companies->update(
            'company_id',
            company: ['name' => 'ACME Corp'],
            workspaceID: 'wk_123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CompanyRegistration::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->companies->update(
            'company_id',
            company: [
                'name' => 'ACME Corp',
                'address' => '123 rue Exemple, Paris',
                'commercialName' => 'ACME',
                'country' => 'FR',
                'email' => 'info@acme.fr',
                'employerIdentificationNumber' => 'EIN123456',
                'legalForm' => 'SARL',
                'phoneNumber' => '+33 1 23 45 67 89',
                'registrationDate' => '2010-05-15',
                'registrationID' => 'RCS123456',
                'shareCapital' => '100000',
                'status' => 'active',
                'taxIdentificationNumber' => 'FR123456789',
                'type' => 'main',
                'websiteURL' => 'https://acme.fr',
            ],
            workspaceID: 'wk_123',
            sourceID: 'ID54410069066',
            technicalData: [
                'activeAmlSuspicions' => false,
                'callbackURL' => 'https://example.com/callback',
                'callbackURLNotification' => 'https://example.com/notify',
                'filteringScoreAmlSuspicions' => 0.75,
                'language' => 'fra',
                'portalSteps' => ['identity_verification', 'document_signing'],
                'rawData' => true,
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CompanyRegistration::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->companies->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->companies->delete('company_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
