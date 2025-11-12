<?php

namespace Tests\Services;

use Dataleon\Client;
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

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->companies->create([
            'company' => ['name' => 'ACME Corp'], 'workspace_id' => 'wk_123',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->companies->create([
            'company' => [
                'name' => 'ACME Corp',
                'address' => '123 rue Exemple, Paris',
                'commercial_name' => 'ACME',
                'country' => 'FR',
                'email' => 'info@acme.fr',
                'employer_identification_number' => 'EIN123456',
                'legal_form' => 'SARL',
                'phone_number' => '+33 1 23 45 67 89',
                'registration_date' => '2010-05-15',
                'registration_id' => 'RCS123456',
                'share_capital' => '100000',
                'status' => 'active',
                'tax_identification_number' => 'FR123456789',
                'type' => 'main',
                'website_url' => 'https://acme.fr',
            ],
            'workspace_id' => 'wk_123',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->companies->retrieve('company_id', []);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->companies->update(
            'company_id',
            ['company' => ['name' => 'ACME Corp'], 'workspace_id' => 'wk_123'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->companies->update(
            'company_id',
            [
                'company' => [
                    'name' => 'ACME Corp',
                    'address' => '123 rue Exemple, Paris',
                    'commercial_name' => 'ACME',
                    'country' => 'FR',
                    'email' => 'info@acme.fr',
                    'employer_identification_number' => 'EIN123456',
                    'legal_form' => 'SARL',
                    'phone_number' => '+33 1 23 45 67 89',
                    'registration_date' => '2010-05-15',
                    'registration_id' => 'RCS123456',
                    'share_capital' => '100000',
                    'status' => 'active',
                    'tax_identification_number' => 'FR123456789',
                    'type' => 'main',
                    'website_url' => 'https://acme.fr',
                ],
                'workspace_id' => 'wk_123',
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->companies->list([]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->companies->delete('company_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
