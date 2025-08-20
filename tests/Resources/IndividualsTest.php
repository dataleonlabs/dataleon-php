<?php

namespace Tests\Resources;

use Dataleon\Client;
use Dataleon\Individuals\IndividualCreateParams\Person;
use Dataleon\Individuals\IndividualCreateParams\TechnicalData;
use Dataleon\Individuals\IndividualUpdateParams\Person as Person1;
use Dataleon\Individuals\IndividualUpdateParams\TechnicalData as TechnicalData1;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class IndividualsTest extends TestCase
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

        $result = $this->client->individuals->create(workspaceID: 'wk_123');

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->individuals->create(
            workspaceID: 'wk_123',
            person: (new Person)
                ->withBirthday('15/05/1985')
                ->withEmail('john.doe@example.com')
                ->withFirstName('John')
                ->withGender('M')
                ->withLastName('Doe')
                ->withMaidenName('John Doe')
                ->withPhoneNumber('+33 1 23 45 67 89'),
            sourceID: 'ID54410069066',
            technicalData: (new TechnicalData)
                ->withCallbackURL('https://example.com/callback')
                ->withCallbackURLNotification('https://example.com/notify')
                ->withLanguage('fra')
                ->withRawData(true),
        );

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->individuals->retrieve('individual_id');

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->individuals->update(
            'individual_id',
            workspaceID: 'wk_123'
        );

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->individuals->update(
            'individual_id',
            workspaceID: 'wk_123',
            person: (new Person1)
                ->withBirthday('15/05/1985')
                ->withEmail('john.doe@example.com')
                ->withFirstName('John')
                ->withGender('M')
                ->withLastName('Doe')
                ->withMaidenName('John Doe')
                ->withPhoneNumber('+33 1 23 45 67 89'),
            sourceID: 'ID54410069066',
            technicalData: (new TechnicalData1)
                ->withCallbackURL('https://example.com/callback')
                ->withCallbackURLNotification('https://example.com/notify')
                ->withLanguage('fra')
                ->withRawData(true),
        );

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->individuals->list();

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->individuals->delete('individual_id');

        $this->assertTrue(true); // @phpstan-ignore-line
    }
}
